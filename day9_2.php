<?php

use Aoc\EncodingError\SumCalculator;

include_once './src/EncodingError/SumCalculator.php';

/** @var array $input */
$input = file('data/day9.txt', FILE_IGNORE_NEW_LINES);

$time1 = microtime(true);
$calculator = new SumCalculator($input, 1492208709);
$result = $calculator->sum();
$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
