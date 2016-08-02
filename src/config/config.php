<?php

/**
 * This file is part of Entrust,
 * a userlog management solution for Laravel.
 *
 * @license MIT
 * @package Jlxh\UserLog
 */

return [

    /*
    |--------------------------------------------------------------------------
    | UserLog Model
    |--------------------------------------------------------------------------
    |
    | This is the UserLog model used by UserLog to create correct relations.  Update
    | the userlog if it is in a different namespace.
    |
    */
    'userlog' => 'App\UserLog',

    /*
    |--------------------------------------------------------------------------
    | UserLog Table
    |--------------------------------------------------------------------------
    |
    | This is the user log table used by UserLog to save logs to the database.
    |
    */
    'table_name' => 'user_log',
];
