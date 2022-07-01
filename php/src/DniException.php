<?php

declare(strict_types=1);

namespace Kata;

use RuntimeException;

final class DniException extends RuntimeException
{
    public static function invalidLength(): self
    {
        return new self('The length should be 9 chars');
    }

    public static function invalidFormat(): self
    {
        return new self('Invalid format');
    }

    public static function invalidLetter(): self
    {
        return new self(
            sprintf(
                "The final letter cannot be ['%s']",
                implode("', '", Dni::INVALID_CHARACTERS)
            )
        );
    }
}
