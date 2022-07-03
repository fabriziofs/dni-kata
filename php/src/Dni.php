<?php

declare(strict_types=1);

namespace Kata;

class Dni
{
    private const VALID_LENGTH        = 9;
    private const INVALID_LETTERS   = ['I', 'Ñ', 'O', 'U'];
    private const VALID_NIE_LETTERS = ['X', 'Y', 'Z'];
    private const LETTER_MAPPER     = [
        0  => 'T',
        1  => 'R',
        2  => 'W',
        3  => 'A',
        4  => 'G',
        5  => 'M',
        6  => 'Y',
        7  => 'F',
        8  => 'P',
        9  => 'D',
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

    public function __construct(string $dni)
    {
        $this->ensureValidLength($dni);
        $this->ensureValidFormat($dni);
        $this->ensureValidLetter($dni);
        $this->ensureValidLetterForThatNumbers($dni);
    }

    private function ensureValidLength(string $dni): void
    {
        if (mb_strlen($dni) !== self::VALID_LENGTH) {
            throw new DniInvalidLengthException();
        }
    }

    private function ensureValidFormat(string $dni): void
    {
        if (!preg_match('/\d{8}[A-ZÑ]/u', $dni) && !$this->firstCharacterIsALetter($dni)) {
            throw new DniInvalidFormatException();
        }
    }

    private function ensureValidLetter(string $dni): void
    {
        if ($this->firstCharacterIsALetter($dni) && !in_array($this->getNieLetter($dni), self::VALID_NIE_LETTERS)) {
            throw new NieInvalidFirstLetterException();
        }

        if (in_array($this->getLetter($dni), self::INVALID_LETTERS)) {
            throw new DniInvalidLetterException();
        }
    }

    private function ensureValidLetterForThatNumbers(string $dni): void
    {
        $number = (int)$this->getNumbers($dni);

        $result = $number % 23;

        $correctLetter = self::LETTER_MAPPER[$result];
        $actualLetter  = $this->getLetter($dni);

        if ($correctLetter !== $actualLetter) {
            throw new DniInvalidLetterException();
        }
    }

    private function getLetter(string $dni): string
    {
        return mb_substr($dni, -1);
    }

    private function getNumbers(string $dni)
    {
        if ($this->firstCharacterIsALetter($dni)) {
            $nieLetter = $this->getNieLetter($dni);
            $numericValue = array_search($nieLetter, self::VALID_NIE_LETTERS);

            $dni = $numericValue . substr($dni, 1, 8);
        }

        return substr($dni, 0, 8);
    }

    private function firstCharacterIsALetter(string $dni): bool
    {
        return !is_numeric($dni[0]);
    }

    private function getNieLetter($dni): string
    {
        return $dni[0];
    }
}
