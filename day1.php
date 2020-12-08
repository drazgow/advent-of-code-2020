<?php

use Aoc\ExpenseReport;
use Aoc\YearFinder;

include_once './src/YearFinder.php';
include_once './src/ExpenseReport.php';

/** @var array $expensesString */
$expensesString = file('data/day1.txt');

$expenses = array_map(function ($item) {
    return (int) $item;
}, $expensesString);

$expense = new YearFinder();

$time1 = microtime(true);
$result = $expense->find2Boost(2020, $expenses);
var_dump($result);

$report = new ExpenseReport();
echo $report->find($result);
echo PHP_EOL . "time: ";
echo microtime(true) - $time1;
