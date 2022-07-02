<?php declare(strict_types=1);

namespace KataTests;

use Kata\Dni;
use PHPUnit\Framework\TestCase;

class DniTest extends TestCase
{
    /** @test */
    public function should_create_a_valid_dni(): void
    {
        $dni = new Dni('31970165G');

        self::assertInstanceOf(Dni::class, $dni);
    }
}
