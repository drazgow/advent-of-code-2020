<?php

declare(strict_types=1);

namespace Aoc;

class YearFinder
{
    public function find(int $year, array $amount): array
    {
        $length = count($amount);
        foreach ($amount as $key => $component1) {
            for ($i = $key + 1; $i < $length; $i++) {
                $component2 = $amount[$i];
                if ($year === ((int)$component1 + (int)$component2)) {
                    return [$component1, $component2];
                }
            }
        }
        return [];
    }
}
