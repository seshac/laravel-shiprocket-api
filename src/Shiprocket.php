<?php

namespace Seshac\Shiprocket;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Seshac\Shiprocket\ShiprocketApi
 */
class Shiprocket extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shiprocket';
    }
}
