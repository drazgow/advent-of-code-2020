<?php

declare(strict_types=1);

namespace Tests;

use Aoc\HandheldHalting\Compiler;
use Aoc\HandheldHalting\CompilerWrongInstruction;
use PHPUnit\Framework\TestCase;

class HandheldHaltingTest extends TestCase
{
    private array $input = [];

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->input = [
            "nop +0",
            "acc +1",
            "jmp +4",
            "acc +3",
            "jmp -3",
            "acc -99",
            "acc +1",
            "jmp -4",
            "acc +6",
        ];
    }

    public function testFindInfiniteLoop(): void
    {
        $compiler = new Compiler($this->input);
        $acc = $compiler->compile();
        $this->assertEquals(5, $acc);
    }

    public function testFindWrongInstruction(): void
    {
        $compiler = new CompilerWrongInstruction($this->input);
        $acc = $compiler->compile();
        $this->assertEquals(8, $acc);
    }

}