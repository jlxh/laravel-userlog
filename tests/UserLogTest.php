<?php

use Jlxh\UserLog\UserLog;

class UserLogTest extends PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
       $this->assertGreaterThan(0, UserLog::create(1, 'test title', 'A', 'test data', 'test sql'));
    }

}
