<?php

use Aoc\TobogganTrajectory\Router;

include_once './src/TobogganTrajectory/Router.php';

/** @var array $input */
$input = file('data/day3_1.txt', FILE_IGNORE_NEW_LINES);

$time1 = microtime(true);
$router = new Router($input);
$result = $router->findTrees(1, 2);
$time = microtime(true) - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
