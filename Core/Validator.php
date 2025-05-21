<?php

namespace Core;

class Validator
{
    public static function string($value, $fieldName, $min = 1, $max = 500)
    {
        $value = trim($value);
        $length = strlen($value);

        if ($length < $min) {
            throw new \Exception("The $fieldName must be at least $min characters.");
        }

        if ($length > $max) {
            throw new \Exception("The $fieldName must be less than $max characters.");
        }

        return $value;
    }

    public static function password($value, $fieldName = 'password', $min = 8, $max = 20 )
    {
        if(strlen($value) < $min) {
            throw new \Exception("The $fieldName must be at least $min characters.");
        }

        if(strlen($value) > $max) {
            throw new \Exception("The $fieldName must be less than $max characters.");
        }

        return $value;
    }
}
