
<?php

require_once('fuel/app/classes/model/message.php');

class Model_MessageTest extends PHPUnit_Extensions_Database_TestCase
{
    public function getConnection()
    {
        $db = \Database_Connection::instance();
        return $this->createDefaultDBConnection($db->connection(),'abctest');
    }

    public function getDataSet()
    {
        return $this->createFlatXmlDataset(APPPATH."tests/db/defaultMessageDataset.xml");
    }

    public function testDummy()
    {
        $this->assertEquals(1,1);
    }

    public function testログインしているユーザが発言したメッセージを降順で取得する()
    {
        $result = Model_Message::message_find_by_userId_desc_by_createdAt(1);
        $expect_userId = $result[1]->user_id;
        $expect_desc = $result[3] > $result[1];
        $this->assertEquals($expect_userId,1);
        $this->assertEquals($expect_desc,true);
    }

    public function test全てのメッセージを取得する()
    {
        $result = Model_Message::message_find_all();
        $expect = count($result);
        $this->assertEquals($expect,3);
    }

    public function testログインユーザへのメンション付きのメッセージを降順で取得する()
    {
        $result = Model_Message::message_find_by_mention_desc_by_createdAt(1);
        $expect_mention = $result[2]->mention;
        $expect_desc = $result[3] > $result[2];
        $this->assertEquals($expect_mention,1);
        $this->assertEquals($expect_desc,true);
    }
}
