<?php

use Aoc\TobogganTrajectory\Router;

include_once './src/TobogganTrajectory/Router.php';

$expenses = file('data/day3_1.txt', FILE_IGNORE_NEW_LINES);

$slopes = [
    [1,1,2],
    [1,3,7],
    [1,5,3],
    [1,7,4],
    [2,1,2],

];

//var_dump(count($expenses));exit();
$time1 = time();
$router = new Router($expenses);
$result = $router->findMultipliedTreesInSlopes($slopes);
$time = time() - $time1;
echo $result;
echo PHP_EOL . "time: ";
echo $time;
echo PHP_EOL;
