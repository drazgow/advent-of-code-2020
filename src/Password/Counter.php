<?php
declare(strict_types=1);

namespace Aoc\Password;

class Counter
{
    /**
     * @var array|string[]
     */
    private array $passwords;
    /**
     * @var Parser
     */
    private Parser $parser;
    /**
     * @var PasswordValidator
     */
    private PasswordValidator $validator;

    /**
     * Counter constructor.
     * @param array|string[] $passwords
     * @param Parser $parser
     * @param PasswordValidator $validator
     */
    public function __construct(array $passwords, Parser $parser, PasswordValidator $validator)
    {
        $this->passwords = $passwords;
        $this->parser = $parser;
        $this->validator = $validator;
    }

    public function count(): int
    {
        $counter = 0;
        foreach ($this->passwords as $toConvert) {
            if ($this->validator->validate(...$this->parser->parse($toConvert))) {
                $counter++;
            }
        }
        return $counter;
    }
}
