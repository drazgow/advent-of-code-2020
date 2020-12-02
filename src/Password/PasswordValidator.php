<?php
declare(strict_types=1);

namespace Aoc\Password;

interface PasswordValidator
{
    public function validate(array $validators, string $letter, string $password): bool;
}
