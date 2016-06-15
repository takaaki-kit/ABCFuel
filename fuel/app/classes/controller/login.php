<?php

class controller_login extends Controller_Template
{
    public $template = 'login';
    public function get_index()
    {
        return View::forge('login', array(
        ));
    }
    public function post_index()
    {
        $user = Model_User::find('first', array(
            'where' => array(
                array('screen_name', Input::param('screen_name')),
                array('password', Input::param('password')),
            ),
        ));
        if (empty($user)) {
            Response::redirect('/login');
        }
        Session::set('id', $user->id);
        Response::redirect('/timeline');
    }
}
