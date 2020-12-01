<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use Aoc\YearFinder;
use Aoc\ExpenseReport;

class ExpenseReportTest extends TestCase
{
    private array $expenses = [];

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->expenses = [
            "1721",
            "979",
            "366",
            "299",
            "675",
            "1456",
        ];
    }

    public function testExpenseReport()
    {
        $report = new ExpenseReport();
        $result = $report->find(["1721", "299"]);
        $this->assertSame(514579, $result);
    }

    public function testExpenseWithTwo()
    {
        $expense = new YearFinder();
        $result = $expense->find(2020, $this->expenses);
        $this->assertSame(["1721", "299"], $result);
    }
}