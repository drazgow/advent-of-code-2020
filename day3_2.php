<?php

use Aoc\TobogganTrajectory\Router;

include_once './src/TobogganTrajectory/Router.php';

/** @var array $input */
$input = file('data/day3_1.txt', FILE_IGNORE_NEW_LINES);

$slopes = [
    [1,1,2],
    [1,3,7],
    [1,5,3],
    [1,7,4],
    [2,1,2],

];

$time1 = microtime(true);
$router = new Router($input);
$result = $router->findMultipliedTreesInSlopes($slopes);
$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
