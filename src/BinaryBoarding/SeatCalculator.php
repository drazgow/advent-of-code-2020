<?php
declare(strict_types=1);

namespace Aoc\BinaryBoarding;

class SeatCalculator
{
    /**
     * @var Parser
     */
    private Parser $parser;
    /**
     * @var SeatDivider
     */
    private SeatDivider $seatDivider;

    /**
     * SeatCalculator constructor.
     * @param Parser $parser
     * @param SeatDivider $seatDivider
     */
    public function __construct(Parser $parser, SeatDivider $seatDivider)
    {
        $this->parser = $parser;
        $this->seatDivider = $seatDivider;
    }

    public function calculate(): int
    {
        $row = $this->seatDivider->calculate(127, $this->parser->rowsAsInstruction());
        $column = $this->seatDivider->calculate(7, $this->parser->seatsAsInstruction());
        return $row * 8 + $column;
    }
}
