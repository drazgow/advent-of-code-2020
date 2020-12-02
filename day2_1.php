<?php

use Aoc\ExpenseReport;
use Aoc\Password\Counter;
use Aoc\Password\Parser;
use Aoc\Password\PasswordValidator;
use Aoc\YearFinder;

include_once './src/Password/Counter.php';
include_once './src/Password/Parser.php';
include_once './src/Password/PasswordValidator.php';

$expenses = file('data/day2_1.txt');


//var_dump(count($expenses));exit();
$time1 = time();
$counter = new Counter($expenses, new Parser(), new PasswordValidator());
$result = $counter->count();
$time = time() - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
