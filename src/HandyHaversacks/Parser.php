<?php
declare(strict_types=1);

namespace Aoc\HandyHaversacks;

class Parser
{
    public function parse(string $input): BagCapacity
    {
        list($name, $bagsInput) = explode(' bags contain ', $input);
        $bagCapacity = new BagCapacity($name);
        $bagsToSep = explode(', ', $bagsInput);

        foreach ($bagsToSep as $bagToSep) {
            $tmp = explode(" ", $bagToSep);
            $bagCapacity->addBags($this->parseCapacity($tmp[0]), $tmp[1] . " " . $tmp[2]);
        }

        return $bagCapacity;
    }

    private function parseCapacity(string $capacity): int
    {
        if ($capacity === 'no') {
            return 0;
        }
        return (int) $capacity;
    }
}
