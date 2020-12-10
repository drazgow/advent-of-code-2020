<?php
declare(strict_types=1);

namespace Aoc\HandyHaversacks;

class Fits
{
    private array $capacities = [];

    /**
     * Fits constructor.
     * @param Parser $parser
     * @param array|string[] $input
     */
    public function __construct(\Aoc\HandyHaversacks\Parser $parser, array $input)
    {
        $this->parse($parser, $input);
    }

    private function parse(Parser $parser, array $input): void
    {
        foreach ($input as $row) {
            $bag = $parser->parse($row);
            foreach ($bag->containedBags() as $name => $capacity) {
                $this->capacities[$name] ??= [];
                $this->capacities[$name][] = $bag->name();
            }
        }
    }

    public function fits(string $bag): int
    {
        $toFind = [$bag];
        $found = [];
        while (!empty($toFind)) {
            $search = array_pop($toFind);
            $fitsIn = $this->capacities[$search] ?? [];
            foreach ($fitsIn as $bag) {
                $found[$bag] = $bag;
                $toFind[] = $bag;
            }
        }
//        print_r($found);
        return count($found);
    }


}
