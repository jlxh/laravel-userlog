<?php

namespace Jlxh\UserLog;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class UserLogJob implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $log;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->log = [
            'user_id'   => $params['userId'],
            'title'     => $params['title'],
            'type'      => $params['type'],
            'data'      => $params['data'],
            'sql'       => $params['sql'],
            'ip'        => Request::ip(),
            'pushed_at' => date('Y-m-d H:i:s'),
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $popedAt = date('Y-m-d H:i:s');

        DB::table(Config::get('userlog.table_name'))->insertGetId(array_merge($this->log,
            ['poped_at' => $popedAt, 'created_at' => date('Y-m-d H:i:s')]));
    }
}
