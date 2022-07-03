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
    public function should_have_a_correct_nie_letter($nie): void
    {
        $this->expectException(NieInvalidFirstLetterException::class);

        new Dni($nie);
    }

    public function invalidNieLetterProvider(): Generator
    {
        yield ['A5090857L'];
        yield ['B9661016H'];
        yield ['C1019582Y'];
    }


    /** @test
     * @dataProvider validNiesProvider
     */
    public function should_change_first_letter_with_the_correct_number($nie): void
    {
        $validNie = new Dni($nie);

        self::assertInstanceOf(Dni::class, $validNie);
    }

    public function validNiesProvider(): Generator
    {
        yield ['Z5090857L'];
        yield ['Y9661016H'];
        yield ['Y1019582Y'];
        yield ['Y2517413P'];
        yield ['Z5470399S'];
        yield ['Y0468622B'];
        yield ['X4326926M'];
        yield ['Z6552219F'];
        yield ['X8327408M'];
        yield ['X1404966B'];
        yield ['Z4791181X'];
        yield ['Y5545378T'];
        yield ['X0098688H'];
        yield ['Z1246847E'];
        yield ['Z0178750E'];
        yield ['Y3699208V'];
        yield ['Y0326894D'];
        yield ['Z3936888Y'];
        yield ['Y0375340V'];
        yield ['X0715825L'];
    }
}
