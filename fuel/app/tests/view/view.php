
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
        $this->assertEquals($expect->user->screen_name,'userID','failed at createSignupViewWithUserParams , screen_name');
        $this->assertEquals($expect->user->name,'userNAME','failed at createSignupViewWithUserParams , name');
        $this->assertEquals($expect->user->password,'userPASS','failed at createSignupViewWithUserParams , password');
    }

    public function testloginのviewをuserオブジェクトのパラメータ付きで作成する()
    {
        $user = Model_User::createUserObject();
        $user->screen_name = 'userID';
        $user->password = 'userPASS';
        $expect = Repository_View::createLoginViewWithUserParams($user);
        $this->assertEquals($expect->postParams->screen_name,'userID','failed at createLoginViewWithUserParams, screen_name');
        $this->assertEquals($expect->postParams->password,'userPASS','failed at createLoginViewWithUserParams, password');
    }

    public function testviewのオブジェクトに新たなパラメータ追加する()
    {
        $view = Repository_View::createLoginViewWithUserParams(Model_User::createUserObject());
        $expect = Repository_View::setNewParam($view,'aho','boke');
        $this->assertEquals($expect->aho,'boke');
    }

}
