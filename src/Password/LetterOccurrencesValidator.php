<?php
declare(strict_types=1);

namespace Aoc\Password;

class LetterOccurrencesValidator implements PasswordValidator
{
    public function validate(array $validators, string $letter, string $password): bool
    {
//        $delimited = explode("", $password);
        $count = count_chars($password, 1);
        $countLetter = $count[ord($letter)] ?? 0;
        return $validators[0] <= $countLetter && $countLetter <= $validators[1];
    }
}
