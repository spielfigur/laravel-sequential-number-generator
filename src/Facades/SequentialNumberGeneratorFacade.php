<?php

namespace Spielfigur\LaravelSequentialNumberGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class SequentialNumberGeneratorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sequential-number-generator';
    }
}
