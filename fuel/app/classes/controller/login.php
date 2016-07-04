<?php

class controller_login extends Controller
{
    public function get_index()
    {
        $auth = new Auth();

        return View::forge('login', ['post_params' => $auth->attribute()]);
    }

    public function post_index()
    {
        $auth = new Auth(Input::param('screen_name'), Input::param('password'));
        if ($auth->enable() === false) {
            $view = View::forge('login', ['post_params' => $auth->attribute()]);
            $view->set_safe('error', 'IDかパスワードが違います');

            return $view;
        }
        Session::set('id', $auth->attribute()->id);
        Response::redirect('/timeline');
    }
}
