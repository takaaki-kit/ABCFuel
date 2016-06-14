<?php

require_once('fuel/app/classes/model/user.php');

class Model_UserTest extends PHPUnit_Framework_TestCase
{
  public function test入力されたscreennameが存在しないならtrueが帰ってくる()
  {
    $this->assertEquals(true,(new Model_User)->isNotYetExistedScreenName('hoge'));
  }

  public function test入力されたscreennameが存在するならfalseが帰ってくる()
  {
    $this->assertEquals(false,(new Model_User)->isNotYetExistedScreenName('aho'));
  }

}
