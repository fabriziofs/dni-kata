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
    }
}
