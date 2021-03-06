<?php

namespace Jlxh\UserLog;

use Illuminate\Support\Facades\Queue;

class UserLog
{
    public function __construct()
    {
    }

    /**
     * Push log to queue.
     *
     * @param int    $userId
     * @param string $title
     * @param string $type
     * @param string $data
     * @param string $sql
     *
     * @return string
     */
    public static function create($userId = 0, $title = '', $type = 'S', $object = '', $object_id = 0, $data = '', $sql = '')
    {
        return Queue::push(new UserLogJob(compact('userId', 'title', 'type', 'object', 'object_id', 'data', 'sql')));
    }
}
