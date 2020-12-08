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

/** @var array $input */
$input = file('data/day2_1.txt');

$time1 = microtime(true);

$counter = new Counter($input, new Parser(), new LetterPositionsValidator());
$result = $counter->count();

$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
