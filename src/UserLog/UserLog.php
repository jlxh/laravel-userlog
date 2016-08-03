<?php

namespace Jlxh\UserLog;

use DB;

class UserLog
{
    public function __construct()
    {
    }

    public static function create($userId, $title = '', $type = 'S', $data = '', $sql = '')
    {
        $log = DB::table('user_log')->insert([
            'user_id' => $userId,
            'title' => $title,
            'type' => $type,
            'data' => $data,
            'sql' => $sql
        ]);
        dd($log);
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
