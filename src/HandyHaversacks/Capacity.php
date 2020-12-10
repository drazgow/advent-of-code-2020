<?php
declare(strict_types=1);

namespace Aoc\HandyHaversacks;

class Capacity
{
    /** @var BagCapacity[]  */
    private array $capacities = [];

    /**
     * Fits constructor.
     * @param Parser $parser
     * @param array|string[] $input
     */
    public function __construct(Parser $parser, array $input)
    {
        $this->parse($parser, $input);
    }

    private function parse(Parser $parser, array $input): void
    {
        foreach ($input as $row) {
            $bag = $parser->parse($row);
            $this->capacities[$bag->name()] = $bag;
        }
    }

    public function fits(string $bag): int
    {
        $toFind = [['name' => $bag, 'capacity' => 1]];
        $sum = 0;
        while (!empty($toFind)) {
            $search = array_pop($toFind);
            $searchName = (string) $search['name'];
            if (!isset($this->capacities[$searchName])) {
                continue;
            }
            $fitsIn = $this->capacities[$searchName];
            $searchCapacity = $search['capacity'];
            foreach ($fitsIn->containedBags() as $name => $bagCapacity) {
                $sum += $searchCapacity * $bagCapacity;
                $toFind[] = ['name' => $name, 'capacity' => $searchCapacity * $bagCapacity];
            }
        }
        return $sum;
    }
}
