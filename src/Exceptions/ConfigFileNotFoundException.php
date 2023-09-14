<?php

namespace Kazemmdev\Snapshot\Exceptions;

use Exception;

class ConfigFileNotFoundException extends Exception
{
    public static function create(): self
    {
        return new static('Please publish the config file by running ' .
            '\'php artisan vendor:publish --tag=snapshot-config\'');
    }
}