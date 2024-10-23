<?php

namespace Gingdev\TursoHranaPHP\Hrana;

use Amp\Cancellation;
use Amp\DeferredFuture;
use Amp\Future;
use Gingdev\TursoHranaPHP\LibSQLException;
use Gingdev\TursoHranaPHP\Util\IDPool;
use Hrana\Ws\ClientMsg;
use Hrana\Ws\OpenStreamReq;
use Hrana\Ws\RequestMsg;
use Revolt\EventLoop;

class HranaClient
{
    /**
     * @param array<int, DeferredFuture<mixed>> $deferreds
     */
    private function __construct(
        private Connection $connection,
        private array $deferreds = [],
        private IDPool $requestIdPool = new IDPool(),
        private IDPool $streamIdPool = new IDPool(),
    ) {
        EventLoop::queue(function (): void {
            while ($serverMsg = $this->connection->receive()) {
                if ($serverMsg->hasResponseOk()) {
                    $id = $serverMsg->getResponseOk()->getRequestId();
                    $this->deferreds[$id]->complete(
                        $serverMsg->getResponseOk()->getExecute()?->getResult()
                    );
                }
                if ($serverMsg->hasResponseError()) {
                    $id = $serverMsg->getResponseError()->getRequestId();
                    $this->deferreds[$id]->error(
                        new LibSQLException(
                            $serverMsg->getResponseError()->getError()
                                ->getMessage()
                        )
                    );
                }
            }
        });
    }

    public static function create(
        string $uri,
        string $jwt,
        ?Cancellation $cancellation = null,
    ): HranaClient {
        $connection = (new Connector($uri, $jwt))->connect($cancellation);

        return new HranaClient($connection);
    }

    public function openStream(): HranaStream
    {
        $openStreamReq = (new OpenStreamReq())
            ->setStreamId($id = $this->streamIdPool->acquire())
        ;
        $requestMsg = (new RequestMsg())
            ->setOpenStream($openStreamReq)
        ;
        $this->sendRequest($requestMsg);

        return new HranaStream($this, $id);
    }

    /**
     * @return Future<mixed>
     */
    public function sendRequest(RequestMsg $requestMsg): Future
    {
        $requestMsg->setRequestId($id = $this->requestIdPool->acquire());
        $clientMsg = (new ClientMsg())
            ->setRequest($requestMsg)
        ;
        $this->connection->send($clientMsg);
        $this->deferreds[$id] = $deferred = new DeferredFuture();
        $deferred->getFuture()->finally(function () use ($requestMsg): void {
            $this->requestIdPool->release($requestMsg->getRequestId());
            if ($requestMsg->hasCloseStream()) {
                $this->streamIdPool->release(
                    $requestMsg->getCloseStream()->getStreamId()
                );
            }
        });

        return $deferred->getFuture();
    }
}
