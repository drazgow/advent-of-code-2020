<?php

use Aoc\ExpenseReport;
use Aoc\Password\Counter;
use Aoc\Password\LetterPositionsValidator;
use Aoc\Password\Parser;
use Aoc\Password\LetterOccurrencesValidator;
use Aoc\YearFinder;

include_once './src/Password/Counter.php';
include_once './src/Password/Parser.php';
include_once './src/Password/PasswordValidator.php';
include_once './src/Password/LetterPositionsValidator.php';

$expenses = file('data/day2_1.txt');


//var_dump(count($expenses));exit();
$time1 = time();
$counter = new Counter($expenses, new Parser(), new LetterPositionsValidator());
$result = $counter->count();
$time = time() - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
