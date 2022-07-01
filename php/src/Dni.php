<?php

declare(strict_types = 1);

namespace Kata;

use RuntimeException;

class Dni
{
    private const VALID_LENGTH = 9;

    public static function fromString(string $value): self
    {
        self::checkLength($value);
        self::checkLastCharMustBeALetter($value);

        if (!preg_match('/\d+$/', substr($value, 0, -1))) {
            throw new RuntimeException('all chars but last one must be numeric');
        }

        if (preg_match('/[UIO]$/', $value)) {
            throw new RuntimeException('invalid characters');
        }

        return new self($value);
    }

    public function __construct(private string $value)
    {
    }

    private static function checkLength(string $value): void
    {
        if (strlen($value) !== self::VALID_LENGTH) {
            throw new RuntimeException('invalid length');
        }
    }

    private static function checkLastCharMustBeALetter(string $value): void
    {
        if (preg_match('/\d$/', $value[self::VALID_LENGTH - 1])) {
            throw new RuntimeException('the last char must be a letter');
        }
    }

    public function toString(): string
    {
        return $this->value;
    }
}
