<?php
declare(strict_types=1);

namespace Tests;

use Aoc\HandyHaversacks\Capacities;
use Aoc\HandyHaversacks\Fits;
use Aoc\HandyHaversacks\Parser;
use PHPUnit\Framework\TestCase;

class HandyHaversacksTest extends TestCase
{
    public function testParserIfContainsBags(): void
    {
        $input = "light red bags contain 1 bright white bag, 2 muted yellow bags.";
        $parser = new Parser();
        $bagCapacity = $parser->parse($input);

        $this->assertEquals(1, $bagCapacity->isContainBag("bright white"));
        $this->assertEquals(2, $bagCapacity->isContainBag("muted yellow"));
        $this->assertEquals(0, $bagCapacity->isContainBag("dotted black"));
    }

    public function testParserIfNotContainsBags(): void
    {
        $input = "faded blue bags contain no other bags.";
        $parser = new Parser();
        $bagCapacity = $parser->parse($input);

        $this->assertEquals(0, $bagCapacity->isContainBag("dotted black"));
    }

    public function testHowManyBagsContain(): void
    {
        $input = [
            "light red bags contain 1 bright white bag, 2 muted yellow bags.",
            "dark orange bags contain 3 bright white bags, 4 muted yellow bags.",
            "bright white bags contain 1 shiny gold bag.",
            "muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.",
            "shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.",
            "dark olive bags contain 3 faded blue bags, 4 dotted black bags.",
            "vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.",
            "faded blue bags contain no other bags.",
            "dotted black bags contain no other bags.",
        ];
        $fits = new Fits(new Parser(), $input);
        $this->assertSame(4, $fits->fits("shiny gold"));
    }

}
