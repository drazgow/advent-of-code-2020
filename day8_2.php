<?php

use Aoc\HandheldHalting\CompilerWrongInstruction;

include_once './src/HandheldHalting/CompilerWrongInstruction.php';

/** @var array $input */
$input = file('data/day8.txt', FILE_IGNORE_NEW_LINES);

$time1 = microtime(true);
$compiler = new CompilerWrongInstruction($input);
$result = $compiler->compile();
$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
