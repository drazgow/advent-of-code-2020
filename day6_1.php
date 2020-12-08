<?php

use Aoc\CustomCustoms\Grouper;

include_once './src/CustomCustoms/Grouper.php';

$instructions = file('data/day6.txt', FILE_IGNORE_NEW_LINES);

//var_dump(count($expenses));exit();
$time1 = microtime(true);
$grouper = new Grouper($instructions);

$result = $grouper->sum();
$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
