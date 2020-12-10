<?php

use Aoc\HandyHaversacks\Fits;
use Aoc\HandyHaversacks\Parser;

include_once './src/HandyHaversacks/Fits.php';
include_once './src/HandyHaversacks/Parser.php';
include_once './src/HandyHaversacks/BagCapacity.php';

/** @var array $input */
$input = file('data/day7.txt', FILE_IGNORE_NEW_LINES);

$time1 = microtime(true);
$fits = new Fits(new Parser(), $input);
$result = $fits->fits("shiny gold");
$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
