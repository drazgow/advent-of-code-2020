<?php

use Aoc\BinaryBoarding\Parser as BinaryParser;
use Aoc\BinaryBoarding\SeatCalculator;
use Aoc\BinaryBoarding\SeatDivider;

include_once './src/BinaryBoarding/Parser.php';
include_once './src/BinaryBoarding/SeatCalculator.php';
include_once './src/BinaryBoarding/SeatDivider.php';

/** @var array $instructions */
$instructions = file('data/day5.txt', FILE_IGNORE_NEW_LINES);

$time1 = microtime(true);

$results = [];
foreach ($instructions as $instruction) {
    $seatCalculator = new SeatCalculator(new BinaryParser($instruction), new SeatDivider());
    $results[] = $seatCalculator->calculate();
}
sort($results);
$current = 13;
foreach ($results as $seat) {
    if ($current !== $seat) {
        break;
    }
    $current++;
}

$time = microtime(true) - $time1;
echo $current;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
