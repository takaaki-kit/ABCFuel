<?php

class LoginTest extends PHPUnit_Extensions_Database_TestCase
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

    public function testscreeen_nameとpasswordが一致するユーザが存在する時、ログイン可能としてそのユーザのオブジェクトを返す()
    {
        $exist_screen_name = 'user1';
        $exist_password = 'aho';
        $user = new Login($exist_screen_name,$exist_password);
        $expect = $user->can_login();
        $this->assertTrue(!empty($expect));
    }

    public function testscreeen_nameとpasswordが一致するユーザが存在しない時、ログイン不可としてそのユーザの空のオブジェクトを返す()
    {
        $no_exist_screen_name = 'dummy';
        $no_exist_password = 'dummy';
        $user = new Login($no_exist_screen_name,$no_exist_password);
        $expect = $user->can_login();
        $this->assertTrue(empty($expect));
    }
}
