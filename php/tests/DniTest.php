<?php
declare(strict_types=1);

namespace KataTests;

use Generator;
use Kata\Dni;
use Kata\DniInvalidFormatException;
use Kata\DniInvalidLengthException;
use Kata\DniInvalidLetterException;
use Kata\NieInvalidFirstLetterException;
use PHPUnit\Framework\TestCase;

class DniTest extends TestCase
{
    /** @test */
    public function should_create_a_valid_dni(): void
    {
        $dni = new Dni('31970165G');

        self::assertInstanceOf(Dni::class, $dni);
    }

    /** @test */
    public function should_have_nine_characters(): void
    {
        $this->expectException(DniInvalidLengthException::class);

        new Dni('1234567N');
    }

    /** @test */
    public function should_have_a_valid_dni_format(): void
    {
        $this->expectException(DniInvalidFormatException::class);

        new Dni('123456789');
    }

    /** @test
     * @dataProvider invalidLetterDniProvider
     */
    public function should_have_a_valid_letter($dni): void
    {
        $this->expectException(DniInvalidLetterException::class);

        new Dni($dni);
    }

    public function invalidLetterDniProvider(): Generator
    {
        yield 'I' => ['12345678I'];
        yield 'Ñ' => ['12345678Ñ'];
        yield 'O' => ['12345678O'];
        yield 'U' => ['12345678U'];
    }

    /** @test
     * @dataProvider invalidLetterMappingDniProvider
     */
    public function should_have_the_correct_letter_for_that_numbers($dni): void
    {
        $this->expectException(DniInvalidLetterException::class);

        new Dni($dni);
    }

    public function invalidLetterMappingDniProvider(): Generator
    {
        yield ['00000000R'];
        yield ['00000001W'];
        yield ['00000002A'];
        yield ['00000003G'];
        yield ['00000004M'];
        yield ['00000005Y'];
        yield ['00000006F'];
        yield ['00000007P'];
        yield ['00000008D'];
        yield ['00000009X'];
        yield ['00000010B'];
        yield ['00000011N'];
        yield ['00000012J'];
        yield ['00000013Z'];
        yield ['00000014S'];
        yield ['00000015Q'];
        yield ['00000016V'];
        yield ['00000017H'];
        yield ['00000018L'];
        yield ['00000019C'];
        yield ['00000020K'];
        yield ['00000021E'];
        yield ['00000022T'];
    }

    /** @test
     * @dataProvider invalidNieLetterProvider
     */
    public function should_have_a_correct_nie_letter($dni): void
    {
        $this->expectException(NieInvalidFirstLetterException::class);

        new Dni($dni);
    }

    public function invalidNieLetterProvider(): Generator
    {
        yield 'X' => ['X2345678A'];
        yield 'Y' => ['Y2345678A'];
        yield 'Z' => ['Z2345678A'];
    }
}
