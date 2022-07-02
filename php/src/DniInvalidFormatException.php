<?php

declare(strict_types=1);

namespace Kata;

use RuntimeException;

final class DniInvalidFormatException extends RuntimeException
{

    public function __construct()
    {
        parent::__construct();
    }
}
