<?php
declare(strict_types=1);

namespace Aoc\Password;

class LetterPositionsValidator implements PasswordValidator
{
    public function validate(array $validators, string $letter, string $password): bool
    {
        $first = substr($password, $validators[0] - 1, 1);
        $second = substr($password, $validators[1] - 1, 1);

//        return $first === $letter ? $second !== $letter : $second === $letter;
        return $first === $letter xor $second === $letter;
    }
}
