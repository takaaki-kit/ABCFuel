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

}
