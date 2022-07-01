<?php declare(strict_types=1);

namespace KataTests;

use Kata\Dni;
use PHPUnit\Framework\TestCase;

class DniTest extends TestCase
{
    /** @test */
    public function when_it_contains_8_chars_then_error(): void
    {
        $this->expectExceptionMessage('too short');

        Dni::fromString('12345678');
    }

    /** @test */
    public function when_it_contains_10_chars_then_error(): void
    {
        $this->expectExceptionMessage('too long');

        Dni::fromString('1234567890');
    }
}
