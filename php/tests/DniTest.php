<?php

declare(strict_types=1);

namespace KataTests;

use Exception;
use Kata\Dni;
use Kata\DniException;
use PHPUnit\Framework\TestCase;

final class DniTest extends TestCase
{
    public function test_valid_dni(): void
    {
        $this->expectException(DniException::class);
        $this->expectExceptionMessage('Invalid DNI letter');

        Dni::create('00000000A');
    }

    public function test_length_lower_nine_characters(): void
    {
        $this->expectException(DniException::class);
        $this->expectExceptionMessageMatches('/The length should be \d chars/');

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
        $this->expectException(DniException::class);
        $this->expectExceptionMessage("The final letter cannot be ['I', 'Ñ', 'O', 'U']");

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

    /**
     * @dataProvider validDnisProvider
     */
    public function test_last_character_should_map_with_characters_mapper(string $dni): void
    {
        $dni = Dni::create($dni);

        self::assertInstanceOf(Dni::class, $dni);
    }

    public function validDnisProvider(): array
    {
        return [
            '31970165G' => ['31970165G'],
            '10448738E' => ['10448738E'],
            '68163822X' => ['68163822X'],
            '68132163E' => ['68132163E'],
            '50791233B' => ['50791233B'],
            '90250990W' => ['90250990W'],
            '87477013D' => ['87477013D'],
            '34272318H' => ['34272318H'],
            '54956042A' => ['54956042A'],
            '78176129A' => ['78176129A'],
            '49390008S' => ['49390008S'],
            '90583399S' => ['90583399S'],
            '08004624A' => ['08004624A'],
            '00062477D' => ['00062477D'],
            '94985972C' => ['94985972C'],
            '87819112Y' => ['87819112Y'],
            '92683017D' => ['92683017D'],
            '17402629R' => ['17402629R'],
            '17206298K' => ['17206298K'],
            '24473205D' => ['24473205D'],
        ];
    }
}
