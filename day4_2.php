<?php

use Aoc\PassportProcessing\Parser;

include_once './src/PassportProcessing/Parser.php';
include_once './src/PassportProcessing/Passport.php';

$input = file('data/day4.txt', FILE_IGNORE_NEW_LINES);

//var_dump(count($expenses));exit();
$time1 = time();
$parser = new Parser();
$parser->parse($input);
$result = $parser->numberOfValidPassports();
$time = time() - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
