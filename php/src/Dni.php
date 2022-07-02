<?php declare(strict_types=1);

namespace Kata;

class Dni
{
    private const VALID_LENGTH = 9;

    public function __construct(string $dni)
    {
        $this->ensureValidLength($dni);
        $this->ensureValidFormat($dni);
        $this->ensureValidLetter($dni);
    }

    private function ensureValidLength(string $dni): void
    {
        if (mb_strlen($dni) !== self::VALID_LENGTH) {
            throw new DniInvalidLengthException();
        }
    }

    private function ensureValidFormat(string $dni): void
    {
        if (!preg_match('/\d{8}[A-ZÑ]/u', $dni)) {
            throw new DniInvalidFormatException();
        }
    }

    private function ensureValidLetter(string $dni): void
    {
        if (in_array(mb_substr($dni, -1), ['I', 'Ñ', 'O', 'U'])) {
            throw new DniInvalidLetterException();
        }
    }
}
