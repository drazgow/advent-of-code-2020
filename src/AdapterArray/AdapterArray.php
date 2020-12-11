<?php

declare(strict_types=1);

namespace Aoc\AdapterArray;

class AdapterArray
{
    /**
     * @var array|string[]
     */
    private array $input;

    /**
     * AdapterArray constructor.
     * @param array|string[] $input
     */
    public function __construct(array $input)
    {
        $this->input = $input;
    }

    public function countSumJoltage()
    {
        $input = array_map(function($item) {
            return (int) $item;
        }, $this->input);

        sort($input);

        $diff = [
            0 => 0,
            1 => 0,
            2 => 0,
            3 => 1,
        ];
        $prev = 0;
        foreach ($input as $adapter) {
            $diff[$adapter - $prev]++;
            $prev = $adapter;
        }
        return $diff[1] * $diff[3];
    }
}
