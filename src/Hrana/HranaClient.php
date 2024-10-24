<?php

namespace Gingdev\TursoHranaPHP\Hrana;

use Amp\Cancellation;
use Amp\DeferredFuture;
use Amp\Future;
use Gingdev\TursoHranaPHP\LibSQLException;
use Gingdev\TursoHranaPHP\Util\IDPool;
use Hrana\StmtResult;
use Hrana\Ws\ClientMsg;
use Hrana\Ws\OpenStreamReq;
use Hrana\Ws\RequestMsg;
use Revolt\EventLoop;

class HranaClient
{
    /**
     * @param array<int, DeferredFuture<StmtResult|null>> $deferreds
     */
    private function __construct(
        private Connection $connection,
        private array $deferreds = [],
        private IDPool $rpool = new IDPool(),
        private IDPool $spool = new IDPool(),
    ) {
        EventLoop::queue(function (): void {
            while ($message = $this->connection->receive()) {
                if ($message->hasResponseOk()) {
                    $id = $message->getResponseOk()->getRequestId();
                    $this->deferreds[$id]->complete($message->getResponseOk()->getExecute()?->getResult());
                }
                if ($message->hasResponseError()) {
                    $id = $message->getResponseError()->getRequestId();
                    $this->deferreds[$id]->error(new LibSQLException($message->getResponseError()->getError()->getMessage()));
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
        $openStreamReq = (new OpenStreamReq())->setStreamId($id = $this->spool->acquire());
        $this->sendRequest((new RequestMsg())->setOpenStream($openStreamReq));

        return new HranaStream($this, $id);
    }

    /**
     * @return Future<StmtResult|null>
     */
    public function sendRequest(RequestMsg $request): Future
    {
        $request->setRequestId($id = $this->rpool->acquire());
        $this->connection->send((new ClientMsg())->setRequest($request));
        $this->deferreds[$id] = $deferred = new DeferredFuture();
        $deferred->getFuture()->finally(function () use ($request): void {
            $this->rpool->release($request->getRequestId());
            if ($request->hasCloseStream()) {
                $this->spool->release($request->getCloseStream()->getStreamId());
            }
        });

        return $deferred->getFuture();
    }
}
