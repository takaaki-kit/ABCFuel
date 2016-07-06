<?php

class AuthTest extends PHPUnit_Extensions_Database_TestCase
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

    public function testscreeen_nameとpasswordが一致するユーザが存在する時、ログイン可能としてtrueを返す()
    {
        $exist_screen_name = 'user1';
        $exist_password = 'aho';
        $user = new Auth($exist_screen_name, $exist_password);
        $expect = $user->enable();
        $this->assertTrue($expect);
    }

    public function testscreeen_nameとpasswordが一致するユーザが存在しない時、ログイン不可としてfalseを返す()
    {
        $no_exist_screen_name = 'dummy';
        $no_exist_password = 'dummy';
        $user = new Auth($no_exist_screen_name, $no_exist_password);
        $expect = $user->enable();
        $this->assertFalse($expect);
    }

    public function testゲッターでログインできなかったscreen_nameをpasswordをもつユーザモデルのオブジェクトをかえす()
    {
        $no_exist_screen_name = 'dummy_screen_name';
        $no_exist_password = 'dummy_password';
        $user = new Auth($no_exist_screen_name, $no_exist_password);
        $user->enable();
        $expect = $user->attribute();
        $this->assertEquals($expect->screen_name, 'dummy_screen_name');
        $this->assertEquals($expect->password, 'dummy_password');
    }
}
