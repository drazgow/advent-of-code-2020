<?php

declare(strict_types=1);

namespace Aoc\EncodingError;

class Calculator
{
    /**
     * @var array|string[]
     */
    private array $input;

    private array $preamble = [];

    private bool $preambleLoaded = false;
    private int $preambleSize;

    /**
     * Calculator constructor.
     * @param array|string[] $input
     * @param int $preambleSize
     */
    public function __construct(array $input, int $preambleSize = 25)
    {
        $this->input = $input;
        $this->preambleSize = $preambleSize;
    }

    public function firstNotSum(): int
    {
        $notSum = 0;
        foreach ($this->input as $item) {
            $item = (int) $item;
            if ($this->preambleLoaded && $this->isNotSum($item)) {
                return $item;
            }
            $this->preambleAdd($item);
        }
        return $notSum;
    }

    private function preambleAdd(int $item): void
    {
        if ($this->preambleLoaded) {
            array_shift($this->preamble);
        } else {
            if (count($this->preamble) === $this->preambleSize) {
                $this->preambleLoaded = true;
            }
        }
        array_push($this->preamble, $item);
    }

    private function isNotSum(int $item): bool
    {
        foreach ($this->preamble as $preambleItem) {
            $toFind = $item - $preambleItem;
            if ($toFind === $preambleItem) {
                continue;
            }
            if (in_array($toFind, $this->preamble)) {
                return false;
            }
        }
        return true;
    }
}
