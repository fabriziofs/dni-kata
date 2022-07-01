<?php
declare(strict_types = 1);

namespace Kata;

class Dni
{
    private const VALID_LENGTH = 9;

    public static function fromString(string $value): self
    {
        if (strlen($value) !== self::VALID_LENGTH) {
            throw new \RuntimeException('invalid length');
        }

        if (preg_match('/\d$/', $value[self::VALID_LENGTH - 1])) {
            throw new \RuntimeException('the last char must be a letter');
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
