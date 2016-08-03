<?php

namespace Jlxh\UserLog;

use DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Queue;

class UserLog
{
    public function __construct()
    {
    }

    public static function create($userId = 0, $title = '', $type = 'S', $data = '', $sql = '')
    {
        Queue::push(function($job) use ($userId, $title, $type, $data, $sql) {
            $pushed_at = date('Y-m-d H:i:s');
            $job->delete();
            $poped_at = date('Y-m-d H:i:s');

            DB::table(Config::get('userlog.table_name'))->insertGetId([
                'user_id' => $userId,
                'title' => $title,
                'type' => $type,
                'data' => $data,
                'sql' => $sql,
                'ip' => Request::ip(),
                'pushed_at' => $pushed_at,
                'poped_at' => $poped_at,
                'created_at' => date('Y-m-d H:i:s')
            ]);

        });
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
