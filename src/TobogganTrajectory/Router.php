<?php
declare(strict_types=1);

namespace Aoc\TobogganTrajectory;

class Router
{
    /**
     * @var array|string[]
     */
    private array $map;
    private int $length;

    /**
     * Router constructor.
     * @param array|string[] $map
     */
    public function __construct(array $map)
    {
        $this->map = $map;
        $this->length = mb_strlen($map[0] ?? "");
    }

    public function findTrees($toDown, $toRight, bool $printPath = false): int
    {
        $row = 0;
        $right = 0;
        $trees = 0;
        foreach ($this->map as $path) {
            $char = substr($path, $right, 1);

            if (!($row % $toDown)) {
                if ($char === '#') {
                        $trees++;
                    $newPath = substr_replace($path, "X", $right, 1);
                } else {
                    $newPath = substr_replace($path, "O", $right, 1);
                }
                $right += $toRight;
                if ($right >= $this->length) {
                    $right -= $this->length;
                }
            } else {
                $newPath = $path;
            }
            if ($printPath) {
                echo $newPath;
                echo PHP_EOL;
            }
            $row++;

        }
        return $trees;
    }

    public function findMultipliedTreesInSlopes(array $slopes): int
    {
        $trees = 1;
        foreach ($slopes as $right) {
            $trees *= $this->findTrees($right[0], $right[1], true);
        }
        return $trees;
    }
}
