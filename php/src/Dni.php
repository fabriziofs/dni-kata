<?php declare(strict_types=1);

namespace Kata;

class Dni
{
    public function __construct(string $dni)
    {
        if (mb_strlen($dni) !== 9) {
            throw new DniInvalidLengthException();
        }

        if (!preg_match('/\d{8}[A-Z]/', $dni))
        {
            throw new DniInvalidFormatException();
        }

        if (in_array(mb_substr($dni, -1), ['I', 'Ñ', 'O', 'U'])) {
            throw new RuntimeException();
        }
    }
}
