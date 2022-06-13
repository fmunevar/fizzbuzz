<?php

namespace App\Utils;

use App\Exceptions\CustomException;

/**
 * Class for input validation
 */
class Validator
{
    public static function validateInput($min, $max)
    {
        if (!is_numeric($min)) {
            throw new CustomException("min must be negative or positive integer");
        }
        if (!is_numeric($max)) {
            throw new CustomException("max must be negative or positive integer");
        }
        if ($min > $max) {
            throw new CustomException("value of min must be lower than max");
        }
    }
}
