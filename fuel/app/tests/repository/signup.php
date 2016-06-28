<?php

class SignupTest extends PHPUnit_Extensions_Database_TestCase
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
        $signup_user = new Signup('test_screen_name','test_name','test_password');
        $expect = $signup_user->save();
        $this->assertTrue($expect);
    }

    public function testユーザを登録できなかったらfalseが帰ってくる()
    {
        $invalid_param = '';
        $signup_user = new Signup($invalid_param,$invalid_param,$invalid_param);
        $expect = $signup_user->save();
        $this->assertFalse($expect);
    }
}
