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
}
