<?php
declare(strict_types=1);

namespace Aoc\CustomCustoms;

class GrouperEveryone
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
            $current[] = str_split($part);
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
            $sum += $this->count($group);
        }
        return $sum;
    }

    private function count(array $group): int
    {
        if (count($group) === 1) {
            return count($group[0]);
        }
        return count(call_user_func_array("array_intersect", $group));
    }

}
