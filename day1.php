<?php

use Aoc\ExpenseReport;
use Aoc\YearFinder;

include_once './src/YearFinder.php';
include_once './src/ExpenseReport.php';

$expenses = file('data/day1.txt');
$expense = new YearFinder();
$result = $expense->find(2020, $expenses);
var_dump($result);

$report = new ExpenseReport();
echo $report->find($result);
