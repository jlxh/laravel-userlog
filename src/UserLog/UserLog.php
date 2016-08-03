<?php

namespace Jlxh\UserLog;

use DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Config;

class UserLog
{
    public function __construct()
    {
    }

    public static function create($userId = 0, $title = '', $type = 'S', $data = '', $sql = '')
    {
        return DB::table(Config::get('userlog.table_name'))->insertGetId([
            'user_id' => $userId,
            'title' => $title,
            'type' => $type,
            'data' => $data,
            'sql' => $sql,
            'ip' => Request::ip()
        ]);
    }

    public function run()
    {
    }

    public function beforeRun()
    {
    }

    public function afterRun()
    {
    }

}
