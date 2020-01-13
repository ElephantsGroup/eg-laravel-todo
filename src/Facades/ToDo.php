<?php

namespace ElephantsGroup\ToDo\Facades;

use Illuminate\Support\Facades\Facade;

class ToDo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'todo';
    }
}
