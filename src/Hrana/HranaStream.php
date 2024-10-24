<?php

namespace Gingdev\TursoHranaPHP\Hrana;

use Amp\Future;
use Gingdev\TursoHranaPHP\LibSQLException;
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
        private bool $isClosed = false,
    ) {
    }

    /**
     * @return Future<StmtResult>
     */
    public function execute(Stmt $stmt): Future
    {
        $this->throwIfClosed();
        $executeReq = (new ExecuteReq())->setStmt($stmt)->setStreamId($this->id);

        return $this->connection->sendRequest((new RequestMsg())->setExecute($executeReq));
    }

    public function close(): void
    {
        $this->throwIfClosed();
        $closeStreamReq = (new CloseStreamReq())->setStreamId($this->id);
        $this->connection->sendRequest((new RequestMsg())->setCloseStream($closeStreamReq))->await();
        unset($this->connection, $this->id);
        $this->isClosed = true;
    }

    private function throwIfClosed(): void
    {
        if ($this->isClosed) {
            throw new LibSQLException(sprintf('The stream #%d is already closed.', $this->id));
        }
    }
}
