<?php

namespace Gingdev\TursoHranaPHP;

use Hrana\Col;
use Hrana\Row;
use Hrana\StmtResult;
use Hrana\Value;

class LibSQLResult
{
    public function __construct(
        private StmtResult $stmtResult,
        private int $cursor = 0,
        private bool $finalize = false,
    ) {
    }

    /**
     * @return mixed[]|false
     */
    public function fetchArray(int $mode = SQLITE3_BOTH): array|false
    {
        $this->throwIfFinalize();
        /** @var Row[] */
        $rows = $this->stmtResult->getRows();
        if (false === $row = $rows[$this->cursor++] ?? false) {
            return false;
        }
        $values = [];
        foreach ($row->getValues() as $i => $value) {
            assert($value instanceof Value);
            $data = $this->convertValue($value);
            if ($mode & SQLITE3_NUM) {
                $values[$i] = $data;
            }
            if ($mode & SQLITE3_ASSOC) {
                $values[$this->columnName($i)] = $data;
            }
        }

        return $values;
    }

    public function columnName(int $index): string|false
    {
        $this->throwIfFinalize();
        /** @var Col[] */
        $cols = $this->stmtResult->getCols();
        if ($column = $cols[$index] ?? false) {
            return $column->getName();
        }

        return false;
    }

    public function numColumns(): int
    {
        $this->throwIfFinalize();

        return $this->stmtResult->getCols()->count();
    }

    public function reset(): bool
    {
        $this->throwIfFinalize();
        $this->cursor = 0;

        return true;
    }

    public function finalize(): bool
    {
        unset($this->stmtResult, $this->cursor);
        $this->finalize = true;

        return true;
    }

    private function convertValue(Value $value): float|int|string|null
    {
        if ($value->hasInteger()) {
            return (int) $value->getInteger();
        }
        if ($value->hasFloat()) {
            return $value->getFloat();
        }
        if ($value->hasText()) {
            return $value->getText();
        }
        if ($value->hasBlob()) {
            return base64_decode($value->getBlob());
        }

        return null;
    }

    private function throwIfFinalize(): void
    {
        if ($this->finalize) {
            throw new LibSQLException(sprintf('The "%s" object is already closed.', __CLASS__));
        }
    }
}
