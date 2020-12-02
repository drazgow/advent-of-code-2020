<?php
declare(strict_types=1);

namespace Aoc\Password;

class Parser
{
    public function parse(string $string): array
    {
//        list($validators, $letter, $password) = preg_split("/[\s]+/", $string);
        list($validators, $letter, $password) = explode(" ", $string);

        $vals = explode("-", $validators);
        return [[(int) $vals[0], (int)$vals[1]], substr($letter, 0, -1), $password];
    }
}
