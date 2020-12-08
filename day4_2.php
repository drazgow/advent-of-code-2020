<?php

use Aoc\PassportProcessing\Parser;

include_once './src/PassportProcessing/Parser.php';
include_once './src/PassportProcessing/Passport.php';

/** @var array $input */
$input = file('data/day4.txt', FILE_IGNORE_NEW_LINES);

$time1 = microtime(true);

$parser = new Parser();
$parser->parse($input);
$result = $parser->numberOfValidPassports();

$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
