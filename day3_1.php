<?php

use Aoc\TobogganTrajectory\Router;

include_once './src/TobogganTrajectory/Router.php';

$expenses = file('data/day3_1.txt', FILE_IGNORE_NEW_LINES);

//var_dump(count($expenses));exit();
$time1 = time();
$router = new Router($expenses);
$result = $router->findTrees();
$time = time() - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
