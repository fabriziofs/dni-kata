<?php
declare(strict_types = 1);

namespace Kata;

class Dni
{
    public static function fromString(string $value): self
    {
        if (strlen($value) !== 9) {
            throw new \RuntimeException('invalid length');
        }

        if (preg_match('/[\d]$/', substr($value, 9 - 1, 1))) {
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
