<?php

namespace Gingdev\TursoHranaPHP\Hrana;

use Amp\Future;
use Hrana\Stmt;
use Hrana\StmtResult;
use Hrana\Ws\CloseStreamReq;
use Hrana\Ws\ExecuteReq;
use Hrana\Ws\RequestMsg;

class HranaStream
{
    public function __construct(
        private HranaClient $connection,
        private int $id,
    ) {
    }

    /**
     * @return Future<StmtResult>
     */
    public function execute(Stmt $stmt): Future
    {
        $executeReq = (new ExecuteReq())
            ->setStmt($stmt)
            ->setStreamId($this->id)
        ;
        $requestMsg = (new RequestMsg())
            ->setExecute($executeReq)
        ;

        return $this->connection->sendRequest($requestMsg);
    }

    public function close(): void
    {
        $closeStreamReq = (new CloseStreamReq())
            ->setStreamId($this->id)
        ;
        $requestMsg = (new RequestMsg())
            ->setCloseStream($closeStreamReq)
        ;
        $this->connection->sendRequest($requestMsg)->await();
        unset($this->connection, $this->id);
    }
}
