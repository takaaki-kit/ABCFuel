<?php

class UserTest extends PHPUnit_Extensions_Database_TestCase
{
    public function getConnection()
    {
        $db = \Database_Connection::instance();

        return $this->createDefaultDBConnection($db->connection(), 'abctest');
    }

    public function getDataSet()
    {
        return $this->createFlatXmlDataset(APPPATH.'tests/db/defaultUserDataset.xml');
    }

    public function test入力されたscreen_nameとpasswordが一致していたらそのユーザオブジェクトを返す()
    {
        $existUserScreenName = 'user1';
        $existUserPass = 'aho';
        $expect = User::find_by_screenName_and_password($existUserScreenName, $existUserPass);
        $this->assertEquals(!empty($expect), true);
    }

    public function test入力されたscreen_nameとpasswordが一致しなければ空のオブジェクトを返す()
    {
        $noExistUserScreenName = 'dummy';
        $noExistUserPass = 'dummy';
        $expect = User::find_by_screenName_and_password($noExistUserScreenName, $noExistUserPass);
        $this->assertEquals(!empty($expect), false);
    }

    public function test空のuserオブジェクトを作成する()
    {
        $expect = get_class(User::create_user_object());
        $this->assertEquals($expect, 'model_user');
    }

    public function testusersテーブルに値を保存する()
    {
        $user = User::create_user_object();
        $user->screen_name = 'userID';
        $user->name = 'userNAME';
        $user->password = 'userPASS';
        $expect = User::save($user);
        $this->assertEquals($expect, true);
    }
}
