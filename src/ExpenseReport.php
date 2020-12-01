<?php
declare(strict_types=1);

namespace Aoc;

class ExpenseReport
{
    public function find(array $expenses): int
    {
        return array_reduce($expenses, function ($previous, $item) {
            return $previous * (int)$item;
        }, 1);
    }
}
