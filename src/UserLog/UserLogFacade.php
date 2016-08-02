<?php

namespace Jlxh\UserLog;

/**
 * This file is part of Jlxh,
 * a userlog management solution for Laravel.
 *
 * @license MIT
 * @package Jlxh\UserLog
 */

use Illuminate\Support\Facades\Facade;

class UserLogFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'userlog';
    }
}
