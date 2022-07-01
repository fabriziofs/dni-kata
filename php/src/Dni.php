<?php

declare(strict_types=1);

namespace Kata;

use Exception;

final class Dni
{
    private const DNI_LENGTH = 9;

    private function __construct(private string $dni)
    {
    }

    public static function create(string $dni): self
    {
        if (strlen($dni) !== self::DNI_LENGTH) {
            throw new Exception();
        }

        return new self($dni);
    }
}
