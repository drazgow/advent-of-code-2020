<?php
declare(strict_types=1);

namespace Tests;

use Aoc\TobogganTrajectory\Router;
use PHPUnit\Framework\TestCase;

class TobogganTrajectoryTest extends TestCase
{
    private array $map = [];

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->map = [
            "..##.......",
            "#...#...#..",
            ".#....#..#.",
            "..#.#...#.#",
            ".#...##..#.",
            "..#.##.....",
            ".#.#.#....#",
            ".#........#",
            "#.##...#...",
            "#...##....#",
            ".#..#...#.#",
        ];
    }

    public function testFindTreesInSlope()
    {
        $router = new Router($this->map);
        $trees = $router->findTrees();
        $this->assertEquals(7, $trees);
    }

    public function testFindTreesInBigMap()
    {
        $map = file('data/day3_1.txt', FILE_IGNORE_NEW_LINES);
        $router = new Router($map);
        $trees = $router->findTrees();
        $this->assertEquals(7, $trees);
    }

}
