<?php

namespace Seshac\Shiprocket;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sketch\Sketch\Sketch
 */
class Shiprocket extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shiprocket';
    }
}
