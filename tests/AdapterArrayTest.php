<?php

declare(strict_types=1);

namespace Tests;

use Aoc\AdapterArray\AdapterArray;
use PHPUnit\Framework\TestCase;

class AdapterArrayTest extends TestCase
{
    private array $input = [];

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->input = [
            "16",
            "10",
            "15",
            "5",
            "1",
            "11",
            "7",
            "19",
            "6",
            "12",
            "4",
        ];
    }

    public function testCountJolts(): void
    {
        $adapter = new AdapterArray($this->input);
        $this->assertEquals(5*7, $adapter->countSumJoltage());
    }

    public function testCountJoltsBigger(): void
    {
        $input = [
            28,
            33,
            18,
            42,
            31,
            14,
            46,
            20,
            48,
            47,
            24,
            23,
            49,
            45,
            19,
            38,
            39,
            11,
            1,
            32,
            25,
            35,
            8,
            17,
            7,
            9,
            4,
            2,
            34,
            10,
            3,
        ];
        $adapter = new AdapterArray($input);
        $this->assertEquals(220, $adapter->countSumJoltage());
    }
}
