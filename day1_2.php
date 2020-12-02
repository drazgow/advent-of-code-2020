<?php

use Aoc\ExpenseReport;
use Aoc\YearFinder;

include_once './src/YearFinder.php';
include_once './src/ExpenseReport.php';

$expensesString = file('data/day1_2.txt');

$expenses = array_map(function ($item) {
    return (int) $item;
}, $expensesString);

var_dump($expenses);

//var_dump(count($expenses));exit();
$expense = new YearFinder(3);
$time1 = time();
$result = $expense->find(2020, $expenses);
var_dump($result);

$report = new ExpenseReport();
echo $report->find($result);
echo PHP_EOL . "time: ";
echo time() - $time1;
