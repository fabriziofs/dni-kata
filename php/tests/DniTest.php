<?php declare(strict_types=1);

namespace KataTests;

use Generator;
use Kata\Dni;
use PHPUnit\Framework\TestCase;
use RuntimeException;

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
        $this->expectException(RuntimeException::class);

        new Dni('1234567N');
    }

    /** @test */
    public function should_have_a_valid_dni_format(): void
    {
        $this->expectException(RuntimeException::class);

        new Dni('123456789');
    }

    /** @test
     * @dataProvider invalidLetterDniProvider
     */
    public function should_have_a_valid_letter($dni): void
    {
        $this->expectException(RuntimeException::class);

        new Dni($dni);
    }

    public function invalidLetterDniProvider(): Generator
    {
        yield 'I' => ['12345678I'];
        yield 'Ñ' => ['12345678Ñ'];
        yield 'O' => ['12345678O'];
        yield 'U' => ['12345678U'];
    }
}
