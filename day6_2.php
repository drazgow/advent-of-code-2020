<?php

use Aoc\CustomCustoms\GrouperEveryone;

include_once './src/CustomCustoms/GrouperEveryone.php';

/** @var array $instructions */
$instructions = file('data/day6.txt', FILE_IGNORE_NEW_LINES);

//var_dump(count($expenses));exit();
$time1 = microtime(true);
$grouper = new GrouperEveryone($instructions);

$result = $grouper->sum();
$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
