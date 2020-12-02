<?php

use Aoc\ExpenseReport;
use Aoc\YearFinder;

include_once './src/YearFinder.php';
include_once './src/ExpenseReport.php';

$expensesString = file('data/day1_2.txt');

$expenses = array_map(function ($item) {
    return (int) $item;
}, $expensesString);


//var_dump(count($expenses));exit();
$expense = new YearFinder(3);
$time1 = time();
$resultF = $expense->find3Boost(2020, $expenses);

$report = new ExpenseReport();
$result =  $report->find($resultF);
$time = time() - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
print_r($resultF);
