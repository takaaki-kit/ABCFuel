<?php

require_once('fuel/app/classes/repository/modeluser.php');

class Repository_ModeluserTest extends PHPUnit_Extensions_Database_TestCase
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
    public function test入力されたscreennameが存在しないならfalseが帰ってくる()
    {
        $noExistScreenName = 'ahoboke';
        $this->assertEquals(false,(new Repository_Modeluser)->isExistedScreenName($noExistScreenName));
    }

    public function test入力されたscreennameが存在するならtrueが帰ってくる()
    {
        $existScreenName = 'user1';
        $this->assertEquals(true,(new Repository_Modeluser)->isExistedScreenName($existScreenName));
    }

    public function test入力されたscreen_nameとpasswordが一致していたらそのユーザオブジェクトを返す()
    {
        $existUserScreenName = 'user1';
        $existUserPass = 'aho';
        $expect = Repository_Modeluser::user_find_by_screenName_and_password($existUserScreenName,$existUserPass);
        $this->assertEquals(!empty($expect),true);
    }

    public function test入力されたscreen_nameとpasswordが一致しなければ空のオブジェクトを返す()
    {
        $noExistUserScreenName = 'dummy';
        $noExistUserPass = 'dummy';
        $expect = Repository_Modeluser::user_find_by_screenName_and_password($noExistUserScreenName,$noExistUserPass);
        $this->assertEquals(!empty($expect),false);
    }

    public function test空のuserオブジェクトを作成する()
    {
        $expect = get_class(Repository_Modeluser::createUserObject());
        $this->assertEquals($expect,'model_user');
    }
}
