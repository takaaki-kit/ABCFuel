
<?php

require_once('fuel/app/classes/repository/view.php');

class Repository_ViewTest extends PHPUnit_Framework_TestCase
{
    public function testsignupのviewをuserオブジェクトのパラメータ付きで作成する()
    {
        $user = Model_User::createUserObject();
        $user->screen_name = 'userID';
        $user->name = 'userNAME';
        $user->password = 'userPASS';
        $expect = Repository_View::createSignupViewWithUserParams($user);
        $this->assertEquals($expect->user->screen_name,'userID');
        $this->assertEquals($expect->user->name,'userNAME');
        $this->assertEquals($expect->user->password,'userPASS');
    }

    public function testloginのviewをuserオブジェクトのパラメータ付きで作成する()
    {
        $user = Model_User::createUserObject();
        $user->screen_name = 'userID';
        $user->password = 'userPASS';
        $expect = Repository_View::createLoginViewWithUserParams($user);
        $this->assertEquals($expect->postParams->screen_name,'userID');
        $this->assertEquals($expect->postParams->password,'userPASS');
    }

}
