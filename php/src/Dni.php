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

        if (preg_match('/\d{8}[A-Z]/', $dni) !== 1) {
            throw new Exception();
        }

        if (in_array($dni[8], ['U', 'I', 'O', 'Ñ'])) {
            throw new Exception();
        }

        return new self($dni);
    }
}
