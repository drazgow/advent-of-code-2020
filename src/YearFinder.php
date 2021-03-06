<?php

declare(strict_types=1);

namespace Aoc;

class YearFinder
{
    private int $numbers;

    public function __construct(int $numbers = 2)
    {
        $this->numbers = $numbers;
    }

    public function find(int $year, array $amount): array
    {
        $length = count($amount);

        $component[] = [];
        $init = -1;

        $req = $this->req($init, $this->numbers - 1, $amount, $length, $component, function($component) use ($year) {
            if ($year === $this->sum($component)) {
                return $component;
            }
            return null;
        });

        return $req;
    }

    public function find2Loops(int $year, array $amount): array
    {
        $length = count($amount);

        $component[] = [];
        $init = -1;

        for ($i = $init + 1; $i < $length; $i++) {
            $component[0] = $amount[$i];
            for ($j = $i + 1; $j < $length; $j++) {
                $component[1] = $amount[$j];
                if ($year === $this->sum($component)) {
                    return $component;
                }
            }
        }

        return [];
    }

    public function find2Boost(int $year, array $amount): array
    {
        $seen = [];
        foreach ($amount as $item) {
            $diff = $year - $item;
            if (in_array($diff, $seen)) {
                return [$item, $diff];
            }

            $seen[] = $item;
        }

        return [];
    }

    public function find3Boost(int $year, array $amount): array
    {
        $length = count($amount);

        $seen = [];
        for ($i = 0; $i < $length; $i++) {
            for ($j = $i + 1; $j < $length; $j++) {
                $diff = $year - $amount[$i] - $amount[$j];
                if (in_array($diff, $seen)) {
                    return [$amount[$i], $amount[$j], $diff];
                }

                $seen[] = $amount[$j];
            }
        }

        return [];
    }

    public function find3Loops(int $year, array $amount): array
    {
        $length = count($amount);

        $component[] = [];
        $init = -1;

        for ($i = $init + 1; $i < $length; $i++) {
            $component[0] = $amount[$i];
            for ($j = $i + 1; $j < $length; $j++) {
                $component[1] = $amount[$j];
                for ($k = $j + 1; $k < $length; $k++) {
                    $component[2] = $amount[$k];
                    if ($year === $this->sum($component)) {
                        return $component;
                    }
                }
            }
        }

        return [];
    }

    private function req($init, $step, $amount, $length, $component, callable $callable)
    {
        for ($i = $init + 1; $i < $length; $i++) {
//            echo ($step . ":" . $i . " -> ");
            $component[$step] = $amount[$i];
            if ($step === 0) {
                $res = $callable($component);
            } else {
                $res = $this->req($i, $step - 1, $amount, $length, $component, $callable);
            }
            if ($res !== null) {
                return $res;
            }
        }
        return null;
    }

    private function sum(array $component)
    {
        return array_reduce(
            $component,
            function ($prev, $item) {
                return $prev + (int)$item;
            },
            0
        );
    }
}
