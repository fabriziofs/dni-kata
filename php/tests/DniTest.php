<?php

declare(strict_types=1);

namespace KataTests;

use Exception;
use Kata\Dni;
use PHPUnit\Framework\TestCase;

final class DniTest extends TestCase
{
    public function test_valid_dni(): void
    {
        $dni = Dni::create('00000000A');

        self::assertInstanceOf(Dni::class, $dni);
    }

    public function test_length_lower_nine_characters(): void
    {
        $this->expectException(Exception::class);

        Dni::create('0');
    }

    public function test_first_eight_characters_are_numbers(): void
    {
        $this->expectException(Exception::class);

        Dni::create('000000000');
    }

    /**
     * @dataProvider invalidCharactersProvider
     */
    public function test_character_should_not_be_an_invalid_character(string $dni): void
    {
        $this->expectException(Exception::class);

        Dni::create($dni);
    }

    public function invalidCharactersProvider(): array
    {
        return [
            'letter I' => ['00000000I'],
            'letter Ñ' => ['00000000Ñ'],
            'letter O' => ['00000000O'],
            'letter U' => ['00000000U'],
        ];
    }
}
