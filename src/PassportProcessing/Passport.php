<?php
declare(strict_types=1);

namespace Aoc\PassportProcessing;

class Passport
{
    private string $raw;
    private array $fields;
    private int $count;

    /**
     * Passport constructor.
     * @param string $input
     */
    public function __construct(string $input)
    {
        $this->process($input);
    }

    public function isValid(): bool
    {
        return $this->isCidValid() ?
            $this->isByrValid() ?
            $this->isIyrValid() ?
            $this->isEyrValid() ?
            $this->isHgtValid() ?
            $this->isHclValid() ?
            $this->isEclValid() ?
            $this->isPidValid()
            : false
            : false
            : false
            : false
            : false
            : false
            : false;
    }

    private function process(string $input): void
    {
        $passport = rtrim($input);
        $fields = explode(" ", $passport);
        $this->raw = $passport;
        foreach ($fields as $field) {
            $exploded = explode(":", $field);
            $this->fields[$exploded[0]] = $exploded[1];
        }
        $this->count = count($fields);
    }

    public function isPidValid(): bool
    {
        if (!isset($this->fields['pid'])) {
            return false;
        }
        $pid = $this->fields['pid'];
        return strlen($pid) === 9 && ctype_digit($pid);
    }

    public function isEclValid(): bool
    {
        if (!isset($this->fields['ecl'])) {
            return false;
        }
        $ecl = $this->fields['ecl'];
        $ecls = ["amb", "blu", "brn", "gry", "grn", "hzl", "oth"];
        return in_array($ecl, $ecls);
    }

    public function isHclValid(): bool
    {
        if (!isset($this->fields['hcl'])) {
            return false;
        }
        $color = $this->fields['hcl'];
        return strlen($color) === 7 && ctype_xdigit(substr($color, 1)) && strlen(ltrim($color, "#")) === 6;
    }

    public function isHgtValid(): bool
    {
        if (!isset($this->fields['hgt'])) {
            return false;
        }
        $hgt = (int)$this->fields['hgt'];
        if (substr($this->fields['hgt'], -2) === 'cm') {
            return $hgt >= 150 && $hgt <= 193;
        } elseif (substr($this->fields['hgt'], -2) === 'in') {
            return  $hgt >= 59 && $hgt <= 76;
        } else {
            return false;
        }
    }

    public function isEyrValid(): bool
    {
        if (!isset($this->fields['eyr'])) {
            return false;
        }
        $eyr = (int)$this->fields['eyr'];
        return  $eyr >= 2020 && $eyr <= 2030;
    }

    public function isIyrValid(): bool
    {
        if (!isset($this->fields['iyr'])) {
            return false;
        }
        $iyr = (int)$this->fields['iyr'];
        return  $iyr >= 2010 && $iyr <= 2020;
    }

    public function isCidValid(): bool
    {
        return $this->count === 8 ?: $this->count === 7 && strpos($this->raw, "cid:") === false;
    }

    public function isByrValid(): bool
    {
        if (!isset($this->fields['byr'])) {
            return false;
        }
        $byr = (int)$this->fields['byr'];
        return  $byr >= 1920 && $byr <= 2002;
    }
}
