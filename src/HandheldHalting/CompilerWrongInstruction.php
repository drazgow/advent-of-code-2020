<?php

declare(strict_types=1);

namespace Aoc\HandheldHalting;

class CompilerWrongInstruction
{
    private array $originalInput;
    private array $input;
    private int $acc = 0;
    private array $done = [];
    private int $corruptionIndex = 0;

    public function __construct(array $input)
    {
        $this->input = $input;
        $this->originalInput = $input;
    }


    public function compile(): int
    {
        $index = 0;
        $last = count($this->input);
        do {
            $index = $this->checkCorruption($index);
            if ($index >= $last) {
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

    private function checkCorruption(int $index): int
    {
        if (in_array($index, $this->done)) {
            $this->changeIndex();
            $this->done = [];
            $this->acc = 0;
            return 0;
        }
        return $index;
    }

    private function changeIndex(): void
    {
        $this->input = $this->originalInput;
        do {
            $this->corruptionIndex++;
            list($command, $value) = explode(' ', $this->input[$this->corruptionIndex]);
            switch ($command) {
                case 'nop':
                    $this->input[$this->corruptionIndex] = "jmp " . $value;
                    return;
                case 'jmp':
                    $this->input[$this->corruptionIndex] = "nop " . $value;
                    return;
            }
        } while (true);
    }
}
