<?php
declare(strict_types=1);

namespace Aoc\PassportProcessing;

class Parser
{
    private int $validPassport = 0;

    public function parse(array $input): array
    {
        $passports = [];
        $current = "";
        foreach ($input as $line) {
            if ($line === "" && $current !== "") {
                $passports[] = $this->countValid(new Passport($current));
                $current = "";
            } else {
                $current .= $line . " ";
            }
        }
        if ($current !== "") {
            $passports[] = $this->countValid(new Passport($current));
        }
        return $passports;
    }

    private function countValid(Passport $passport): Passport
    {
        $this->validPassport += $passport->isValid() ? 1 : 0;
        return $passport;
    }

    public function numberOfValidPassports(): int
    {
        return $this->validPassport;
    }
}
