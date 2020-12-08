<?php

use Aoc\ExpenseReport;
use Aoc\YearFinder;

include_once './src/YearFinder.php';
include_once './src/ExpenseReport.php';

/** @var array $expensesString */
$expensesString = file('data/day1_2.txt');

$expenses = array_map(function ($item) {
    return (int) $item;
}, $expensesString);


$expense = new YearFinder(3);
$time1 = microtime(true);
$resultF = $expense->find3Boost(2020, $expenses);

$report = new ExpenseReport();
$result =  $report->find($resultF);
$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
print_r($resultF);
