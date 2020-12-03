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

    public function findTrees(bool $printPath = false): int
    {
        $right = 0;
        $trees = 0;
        foreach ($this->map as $path) {
            $char = substr($path, $right, 1);

            if ($char === '#') {
                $trees++;
                $newPath = substr_replace($path, "X", $right, 1);
            } else {
                $newPath = substr_replace($path, "O", $right, 1);
            }
            if ($printPath) {
                echo $newPath;
                echo PHP_EOL;
            }
            $right += 3;
            if ($right >= $this->length) {
                $right -= $this->length;
            }
        }
        return $trees;
    }
}
