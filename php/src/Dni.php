<?php declare(strict_types=1);

namespace Kata;

use RuntimeException;

class Dni
{
    public function __construct(string $dni)
    {
        if (mb_strlen($dni) !== 9) {
            throw new RuntimeException();
        }

        if (!preg_match('/\d{8}[A-Z]/', $dni))
        {
            throw new RuntimeException();
        }

        if (in_array(mb_substr($dni, -1), ['I', 'Ñ', 'O', 'U'])) {
            throw new RuntimeException();
        }
    }
}
