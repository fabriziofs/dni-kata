<?php

declare(strict_types=1);

namespace Kata;

final class Dni
{
    private const DNI_LENGTH = 9;
    public const INVALID_CHARACTERS = ['I', 'Ñ', 'O', 'U'];

    private function __construct(private string $dni)
    {
    }

    public static function create(string $dni): self
    {
        self::thrownExceptionIfInvalidLength($dni);
        self::thrownExceptionIfInvalidFormat($dni);
        self::thrownExceptionIfInvalidCharacter($dni);

        return new self($dni);
    }

    private static function thrownExceptionIfInvalidLength(string $dni): void
    {
        if (mb_strlen($dni) !== self::DNI_LENGTH) {
            throw DniException::invalidLength();
        }
    }

    private static function thrownExceptionIfInvalidFormat(string $dni): void
    {
        if (preg_match('/\d{8}[A-ZÑ]/u', $dni) !== 1) {
            throw DniException::invalidFormat();
        }
    }

    private static function thrownExceptionIfInvalidCharacter(string $dni): void
    {
        if (in_array(mb_substr($dni, -1), self::INVALID_CHARACTERS)) {
            throw DniException::invalidLetter();
        }
    }
}
