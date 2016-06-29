<?php

class SignupUserTest extends PHPUnit_Extensions_Database_TestCase
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

    public function testユーザを登録できるときtrueが帰ってくる()
    {
        $signup_user = new SignupUser('test_screen_name','test_name','test_password');
        $expect = $signup_user->save();
        $this->assertTrue($expect);
    }

    public function testユーザを登録できなかったら例外が帰ってくる()
    {
        $invalid_param = '';
        $signup_user = new SignupUser($invalid_param,$invalid_param,$invalid_param);
        try {
            $signup_user->save();
            $this->fail();
        } catch (Exception $e){
            $this->assertEquals(get_class($e),'Orm\ValidationFailed');
        }
    }

    public function test登録したユーザのIDを返す()
    {
        $signup_user = new SignupUser('aho','boke','kasu');
        $signup_user->save();
        $expect = $signup_user->get_id();
        $this->assertEquals($expect,4);
    }
}
