<?php

namespace Gingdev\TursoHranaPHP\Util;

class IDPool
{
    /** @var list<int> */
    private array $free = [];

    private int $maxUsed = 0;

    public function acquire(): int
    {
        if ($this->free) {
            return array_pop($this->free);
        }

        return $this->maxUsed++;
    }

    public function release(int $id): void
    {
        array_push($this->free, $id);
    }
}
