<?php

use Jlxh\UserLog\UserLog;

class UserLogTest extends PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $userLog = new UserLog();
        $this->assertInstanceOf('Jlxh\UserLog\UserLog', $userLog);
    }

    public function testCreate()
    {
        // $this->assertNotNull(UserLog::create(1, 'test title', 'A', 'test data', 'test sql'));
    }
}
