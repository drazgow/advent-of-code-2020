<?php
declare(strict_types=1);

namespace Aoc\BinaryBoarding;

class SeatDivider
{

    /**
     * SeatCalculator constructor.
     */
    public function __construct()
    {
    }

    public function calculate(int $int, array $instructions): int
    {
        $range = [0, $int];

        $instruction = true;
        foreach ($instructions as $instruction) {
            $bound = round(($range[1] - $range[0]) / 2);
            $range = $instruction ?  [$range[0], $range[1] - $bound] : [$range[0] + $bound, $range[1]];
        }

        return (int) ($instruction ? $range[0] : $range[1]);
    }
}
