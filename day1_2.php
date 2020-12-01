<?php

use Aoc\ExpenseReport;
use Aoc\YearFinder;

include_once './src/YearFinder.php';
include_once './src/ExpenseReport.php';

$expenses = file('data/day1_2.txt');
//var_dump(count($expenses));exit();
$expense = new YearFinder(3);
$time1 = time();
$result = $expense->find(2020, $expenses);
var_dump($result);

$report = new ExpenseReport();
echo $report->find($result);
echo PHP_EOL . "time: ";
echo time() - $time1;
