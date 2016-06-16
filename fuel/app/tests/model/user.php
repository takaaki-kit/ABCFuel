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

}
