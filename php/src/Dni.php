<?php
declare(strict_types = 1);

namespace Kata;

class Dni
{
    public static function fromString(string $value): self
    {
        if (strlen($value) < 9 || strlen($value) > 9) {
            throw new \RuntimeException('invalid length');
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
