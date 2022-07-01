<?php

declare(strict_types = 1);

namespace Kata;

use RuntimeException;

class Dni
{
    private const VALID_LENGTH = 9;

    public static function fromString(string $value): self
    {
        if (strlen($value) !== self::VALID_LENGTH) {
            throw new RuntimeException('invalid length');
        }

        if (preg_match('/\d$/', $value[self::VALID_LENGTH - 1])) {
            throw new RuntimeException('the last char must be a letter');
        }

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

    public function toString(): string
    {
        return $this->value;
    }
}
