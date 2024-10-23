<?php

namespace Gingdev\TursoHranaPHP;

use Gingdev\TursoHranaPHP\Hrana\HranaClient;
use Gingdev\TursoHranaPHP\Hrana\HranaStream;
use Hrana\Stmt;

class LibSQL
{
    private HranaStream $connection;

    private int $changes = 0;

    private int $lastInsertRowId = 0;

    public function __construct(
        HranaClient $client,
    ) {
        $this->connection = $client->openStream();
    }

    public function exec(string $query): bool
    {
        $stmt = (new Stmt())
            ->setSql($query)
            ->setWantRows(false)
        ;
        $this->connection->execute($stmt)->await();

        return true;
    }

    public function prepare(string $query): LibSQLStmt
    {
        return new LibSQLStmt($this, $query);
    }

    public function query(string $query): LibSQLResult
    {
        return $this->prepare($query)->execute();
    }

    public function lastInsertRowID(): int
    {
        return $this->lastInsertRowId;
    }

    public function changes(): int
    {
        return $this->changes;
    }

    public function close(): void
    {
        $this->connection->close();
    }
}
