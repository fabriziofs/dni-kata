<?php

declare(strict_types = 1);

namespace KataTests;

use Kata\Dni;
use PHPUnit\Framework\TestCase;

class DniTest extends TestCase
{
    /** @test */
    public function should_create_dni_give_valid_value(): void
    {
        $validDni = '31970165G';
        $dni = Dni::fromString($validDni);
        self::assertSame($validDni, $dni->toString());
    }

    /** @test */
    public function when_it_contains_8_chars_then_invalid_length(): void
    {
        $this->expectExceptionMessage('invalid length');

        Dni::fromString('12345678');
    }

    /** @test */
    public function when_it_contains_10_chars_then_invalid_length(): void
    {
        $this->expectExceptionMessage('invalid length');

        Dni::fromString('1234567890');
    }

    /** @test */
    public function when_last_char_is_not_a_letter_then_error(): void
    {
        $this->expectExceptionMessage('the last char must be a letter');

        Dni::fromString('123456789');
    }

    /** @test */
    public function when_all_chars_but_last_char_are_not_numeric_then_error(): void
    {
        $this->expectExceptionMessage('all chars but last one must be numeric');

        Dni::fromString('abcdefghi');
    }

    /**
     * @test
     * @dataProvider providerWhenItContainsInvalidChars
     */
    public function when_it_contains_invalid_chars(string $invalidChar): void
    {
        $this->expectExceptionMessage("invalid characters");

        Dni::fromString('31970165' . $invalidChar);
    }

    public function providerWhenItContainsInvalidChars(): iterable
    {
        yield ['U' => 'U'];
        yield ['I' => 'I'];
        yield ['O' => 'O'];
//        yield ['Ñ' => 'Ñ'];
    }
}
