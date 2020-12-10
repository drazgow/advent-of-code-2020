<?php

declare(strict_types=1);

namespace Aoc\HandheldHalting;

class Compiler
{
    private array $input;
    private int $acc = 0;
    private array $done = [];

    public function __construct(array $input)
    {
        $this->input = $input;
    }


    public function compile(): int
    {
        $index = 0;
        do {
            if (in_array($index, $this->done)) {
                return $this->acc;
            }
            $index = $this->exec($index);
        } while (true);
    }

    private function exec(int $index): int
    {
        $this->done[] = $index;
        list($command, $value) = explode(' ', $this->input[$index]);
        $next = $index;
        switch ($command) {
            case 'nop':
                $next++;
                break;
            case 'acc':
                $this->acc += (int)$value;
                $next++;
                break;
            case 'jmp':
                $next += (int)$value;
                break;
        }

        return $next;
    }
}
