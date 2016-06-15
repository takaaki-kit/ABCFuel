<?php

class controller_signup extends Controller_Template
{
    public $template = 'signup';

    public function get_index()
    {
        return View::forge('signup', array(
            'screen_name' => '',
            'name'        => '',
            'password'    => '',
        ));
    }

    public function post_signup()
    {
        $model = Model_User::forge();
        $view  = View::forge('signup', array(
           'screen_name' => Input::param('screen_name'),
           'name'        => Input::param('name'),
           'password'    => Input::param('password'),
        ));
        $model->screen_name = Input::param('screen_name');
        $model->name        = Input::param('name');
        $model->password    = Input::param('password');
        try {
            $model->save();
        } catch (\Orm\ValidationFailed $e) {
            return $view;
        }
        Session::set('id', $model->id);
        Response::redirect('/timeline');
    }
}
