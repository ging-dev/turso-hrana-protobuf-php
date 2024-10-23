<?php

namespace Gingdev\TursoHranaPHP;

use Hrana\NamedArg;
use Hrana\Stmt;
use Hrana\Value;
use Hrana\Value\PBNull;

class LibSQLStmt
{
    /**
     * @param Value[]    $args
     * @param NamedArg[] $namedArgs
     */
    public function __construct(
        private LibSQL $connection,
        string $query,
        private Stmt $stmt = new Stmt(),
        private array $args = [],
        private array $namedArgs = [],
    ) {
        $stmt->setSql($query)
            ->setWantRows(true);
    }

    public function bindValue(int|string $param, mixed $value, int $type = SQLITE3_TEXT): bool
    {
        $data = new Value();
        $data = match ($type) {
            SQLITE3_TEXT => $data->setText((string) $value),
            SQLITE3_INTEGER => $data->setInteger((int) $value),
            SQLITE3_FLOAT => $data->setFloat((float) $value),
            SQLITE3_BLOB => $data->setBlob((string) $value),
            SQLITE3_NULL => $data->setNull(new PBNull()),
            default => false,
        };
        if ($data) {
            if (is_int($param)) {
                $this->args[max(0, $param - 1)] = $data;
            } else {
                $this->namedArgs[] = (new NamedArg())
                    ->setName($param)
                    ->setValue($data)
                ;
            }

            return true;
        }

        return false;
    }

    public function execute(): LibSQLResult
    {
        $result = \Closure::bind(
            /**
             * @param Args[]     $args
             * @param NamedArg[] $namedArgs
             */
            function (Stmt $stmt, array $args, array $namedArgs): LibSQLResult {
                // phpcs:disable
                $result = $this->connection->execute(
                    $stmt->setArgs($args)
                        ->setNamedArgs($namedArgs)
                )->await();
                $this->lastInsertRowId = (int) $result->getLastInsertRowid();
                $this->changes = (int) $result->getAffectedRowCount();

                return new LibSQLResult($result);
            },
            $this->connection,
            $this->connection::class
        );

        return $result($this->stmt, $this->args, $this->namedArgs);
    }

    public function reset(): bool
    {
        $this->args = $this->namedArgs = [];

        return true;
    }
}
