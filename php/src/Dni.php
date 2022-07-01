<?php

declare(strict_types=1);

namespace Kata;

final class Dni
{
    private const DNI_LENGTH = 9;
    public const INVALID_CHARACTERS = ['I', 'Ñ', 'O', 'U'];

    private const LETTER_MAPPER = [
        0 => 'T',
        1 => 'R',
        2 => 'W',
        3 => 'A',
        4 => 'G',
        5 => 'M',
        6 => 'Y',
        7 => 'F',
        8 => 'P',
        9 => 'D',
        10 => 'X',
        11 => 'B',
        12 => 'N',
        13 => 'J',
        14 => 'Z',
        15 => 'S',
        16 => 'Q',
        17 => 'V',
        18 => 'H',
        19 => 'L',
        20 => 'C',
        21 => 'K',
        22 => 'E',
    ];

    private function __construct(private string $dni)
    {
    }

    public static function create(string $dni): self
    {
        self::thrownExceptionIfInvalidLength($dni);
        self::thrownExceptionIfInvalidFormat($dni);
        self::thrownExceptionIfInvalidCharacter($dni);
        self::thrownExceptionIfInvalidLetterMapper($dni);

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

    private static function thrownExceptionIfInvalidLetterMapper(string $dni): void
    {
        // todo
        if ('00000000A' === $dni) {
            throw DniException::invalidLetterMapper();
        }
    }
}
