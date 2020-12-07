<?php
declare(strict_types=1);

namespace Aoc\BinaryBoarding;

class Parser
{
    private string $instructions;
    private array $rows;
    private array $seats;

    public function __construct(string $instructions)
    {
        $this->instructions = $instructions;
        $this->parse($instructions);
    }

    private function parse(string $instruction): void
    {
        $instructions =  str_split($instruction);
        $this->rows = array_slice($instructions, 0, 7);
        $this->seats = array_slice($instructions, 7);
    }

    public function rows(): array
    {
        return $this->rows;
    }

    public function rowsAsInstruction(): array
    {
        return $this->translate($this->rows);
    }

    public function seats(): array
    {
        return $this->seats;
    }

    public function seatsAsInstruction(): array
    {
        return $this->translate($this->seats);
    }

    private function translate(array $instructions): array
    {
        return array_map(function ($instr) {
            return $instr === "F" || $instr === 'L';
        }, $instructions);
    }

}
