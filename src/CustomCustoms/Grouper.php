<?php
declare(strict_types=1);

namespace Aoc\CustomCustoms;

class Grouper
{

    private array $groups;

    /**
     * Grouper constructor.
     * @param array|string[] $input
     */
    public function __construct(array $input)
    {
        $this->groups = $this->parse($input);
    }

    public function groups(): array
    {
        return $this->groups;
    }



    private function parse(array $input): array
    {
        $current = [];
        $groups = [];
        foreach ($input as $part) {
            if ($part === "") {
                $groups[] = $current;
                $current = [];
                continue;
            }
            $current = array_unique(array_merge(str_split($part), $current));
        }
        if (!empty($current)) {
            $groups[] = $current;
        }
        return $groups;
    }

    public function sum(): int
    {
        $sum = 0;
        foreach ($this->groups as $group) {
            $sum += count($group);
        }
        return $sum;
    }
}
