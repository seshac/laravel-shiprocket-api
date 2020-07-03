<?php

namespace Sketch\Sketch;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sketch\Sketch\Sketch
 */
class SketchFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sketch';
    }
}
