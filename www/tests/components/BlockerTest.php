<?php

require_once __DIR__ . '/../../app/components/Blocker.php';

use PHPUnit\Framework\TestCase;

class BlockerTest extends TestCase
{
    public function test_checkIp($ip = "188.143.234.155")
    {
        $res = \App\Components\Blocker::checkIp($ip);
        $this->assertTrue($res);
    }

    /**
     * @dataProvider provider
     * @param $arr
     */
    public function testOne($arr)
    {
        $this->assertEquals(1, $arr[0]);
    }

    public function provider()
    {
        return array(1, 2);
    }
}