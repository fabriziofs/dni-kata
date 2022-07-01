<?php

declare(strict_types=1);

namespace KataTests;

use Exception;
use Kata\Dni;
use PHPUnit\Framework\TestCase;

final class DniTest extends TestCase
{
    public function test_length_lower_nine_characters(): void
    {
        $this->expectException(Exception::class);

        Dni::create('0');
    }

    public function test_length_is_nine_characters(): void
    {
        $dni = Dni::create('000000000');

        self::assertInstanceOf(Dni::class, $dni);
    }
}
