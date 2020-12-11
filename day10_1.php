<?php

use Aoc\AdapterArray\AdapterArray;

include_once './src/AdapterArray/AdapterArray.php';

/** @var array $input */
$input = file('data/day10.txt', FILE_IGNORE_NEW_LINES);

$time1 = microtime(true);
$adapter = new AdapterArray($input);
$result = $adapter->countSumJoltage();
$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
