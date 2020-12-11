<?php

use Aoc\EncodingError\Calculator;

include_once './src/EncodingError/Calculator.php';

/** @var array $input */
$input = file('data/day9.txt', FILE_IGNORE_NEW_LINES);

$time1 = microtime(true);
$calculator = new Calculator($input, 25);
$result = $calculator->firstNotSum();
$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
