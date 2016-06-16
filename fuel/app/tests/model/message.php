
<?php

require_once('fuel/app/classes/model/message.php');

class Model_MessageTest extends PHPUnit_Framework_TestCase
{
    public function testログインしているユーザが発言したメッセージを降順で取得する()
    {
        $result = Model_Message::message_find_by_userId_desc_by_createdAt(1);
        $expect_userId = $result[3]->user_id;
        $expect_desc = $result[4] > $result[3];
        $this->assertEquals($expect_userId,1);
        $this->assertEquals($expect_desc,true);
    }

    public function test全てのメッセージを取得する()
    {
        $result = Model_Message::message_find_all();
        $expect = count($result);
        $this->assertEquals($expect,4);
    }
}
