<?php

declare(strict_types=1);

namespace Aoc\EncodingError;

class SumCalculator
{
    /**
     * @var array|string[]
     */
    private array $input;
    private float $invalid;

    private float $sum = 0;
    private array $parts = [];

    /**
     * SumCalculator constructor.
     * @param array|string[] $input
     * @param float $invalid
     */
    public function __construct(array $input, float $invalid)
    {
        $this->input = $input;
        $this->invalid = $invalid;
    }

    public function sum(): int
    {
        $input = $this->input;
        while ($input !== []) {
            if ($this->sum === $this->invalid) {
                return (int) (max($this->parts) + min($this->parts));
            } elseif ($this->sum < $this->invalid) {
                $part = array_shift($input);
                $this->parts[] = $part;
                $this->sum += $part;
            } elseif ($this->sum > $this->invalid) {
                $part = array_shift($this->parts);
                $this->sum -= $part;
            }
        }
        return 0;
    }
}
