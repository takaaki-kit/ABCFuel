<?php

class controller_login extends Controller_Template
{
    public $template = 'login';
    public function get_index()
    {
        return View::forge('login',['user' => Model_User::forge()]);
    }
    public function post_index()
    {

        $model = Model_User::forge();
        $model->screen_name = Input::param('screen_name');
        $model->password = Input::param('password');
        $user = Model_User::find('first', array(
            'where' => array(
                array('screen_name', $model->screen_name),
                array('password', $model->password),
            ),
        ));
        $view = View::forge('login', ['user' => $model]);
        if (empty($user)) {
            $error = ';
            $view->set('error', $error);

            return $view;
        }
        Session::set('id', $user->id);
        Response::redirect('/timeline');
    }
}
