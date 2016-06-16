<?php

require_once('fuel/app/classes/model/user.php');

class Model_UserTest extends PHPUnit_Framework_TestCase
{
    public function test入力されたscreennameが存在しないならtrueが帰ってくる()
    {
        $noScreenName = 'ahoboke';
        $this->assertEquals(true,(new Model_User)->isNotYetExistedScreenName($noScreenName));
    }

    public function test入力されたscreennameが存在するならfalseが帰ってくる()
    {
        $existScreenName = 'hoge';
        $this->assertEquals(false,(new Model_User)->isNotYetExistedScreenName($existScreenName));
    }

    public function testログインしているユーザが発言したメッセージを降順で取得する()
    {
        $result = Model_User::message_find_by_userId_desc_by_createdAt(1);
        $expect_userId = $result[3]->user_id;
        $expect_desc = $result[4] > $result[3];
        $this->assertEquals($expect_userId,1);
        $this->assertEquals($expect_desc,true);
    }

}
