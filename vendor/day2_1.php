<?php

use Aoc\ExpenseReport;
use Aoc\YearFinder;

include_once './src/YearFinder.php';
include_once './src/ExpenseReport.php';

$values = file('data/day2_1.txt');


$parser = new Parser();
$result = $parser->parse("1-3 a: abcde");
$this->assertSame([[1,3], 'a', "abcde"], $result);

$time1 = microtime(true);
$result = $expense->find2Boost(2020, $expenses);
var_dump($result);

$report = new ExpenseReport();
echo $report->find($result);
echo PHP_EOL . "time: ";
echo microtime(true) - $time1;
