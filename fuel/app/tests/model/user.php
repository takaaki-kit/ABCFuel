<?php

require_once('fuel/app/classes/model/user.php');

class Model_UserTest extends PHPUnit_Extensions_Database_TestCase
{
    public function getConnection()
    {
        $db = \Database_Connection::instance();
        return $this->createDefaultDBConnection($db->connection(),'abctest');
    }

    public function getDataSet()
    {
        return $this->createFlatXmlDataset(APPPATH."tests/db/defaultUserDataset.xml");
    }
    public function test入力されたscreennameが存在しないならtrueが帰ってくる()
    {
        $noScreenName = 'ahoboke';
        $this->assertEquals(true,(new Model_User)->isNotYetExistedScreenName($noScreenName));
    }

    public function test入力されたscreennameが存在するならfalseが帰ってくる()
    {
        $existScreenName = 'user1';
        $this->assertEquals(false,(new Model_User)->isNotYetExistedScreenName($existScreenName));
    }

    public function test入力されたscreen_nameとpasswordが一致していたらそのユーザオブジェクトを返す()
    {
        $existUserScreenName = 'user1';
        $existUserPass = 'aho';
        $expect = Model_User::user_find_by_screenName_and_password($existUserScreenName,$existUserPass);
        $this->assertEquals(!empty($expect),true);
    }

    public function test入力されたscreen_nameとpasswordが一致しなければ空のオブジェクトを返す()
    {
        $noExistUserScreenName = 'dummy';
        $noExistUserPass = 'dummy';
        $expect = Model_User::user_find_by_screenName_and_password($noExistUserScreenName,$noExistUserPass);
        $this->assertEquals(!empty($expect),false);
    }

    public function test空のuserオブジェクトを作成する()
    {
        $expect = get_class(Model_User::createUserObject());
        $this->assertEquals($expect,'model_user');
    }
}
