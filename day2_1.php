<?php

use Aoc\ExpenseReport;
use Aoc\Password\Counter;
use Aoc\Password\Parser;
use Aoc\Password\LetterOccurrencesValidator;
use Aoc\YearFinder;

include_once './src/Password/Counter.php';
include_once './src/Password/Parser.php';
include_once './src/Password/PasswordValidator.php';
include_once './src/Password/LetterOccurrencesValidator.php';

/** @var array $expenses */
$expenses = file('data/day2_1.txt');

$time1 = microtime(true);

$counter = new Counter($expenses, new Parser(), new LetterOccurrencesValidator());
$result = $counter->count();

$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
