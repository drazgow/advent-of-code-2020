<?php
declare(strict_types=1);

namespace Aoc\HandyHaversacks;

class BagCapacity
{
    private string $name;
    private array $bags = [];

    /**
     * BagCapacity constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addBags(int $capacity, string $bagName): void
    {
        $this->bags[$bagName] = $capacity;
    }

    public function isContainBag(string $name): bool
    {
        return isset($this->bags[$name]) ? $this->bags[$name] > 0 : false;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function containedBags(): array
    {
        return $this->bags;
    }
}
