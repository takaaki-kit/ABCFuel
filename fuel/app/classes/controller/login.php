<?php

class controller_login extends Controller
{
    public function get_index()
    {
        return View::forge('login',['postParams' => User::create_user_object()]);
    }
    public function post_index()
    {
        $user = new Login(Input::param('screen_name'),Input::param('password'));
        if ($user->can_login() === false) {
            $view = View::forge('login', ['postParams' => $postParams]);
            $view->set_safe('error', 'IDかパスワードが違います');

            return $view;
        }
        Session::set('id', $user->get_id());
        Response::redirect('/timeline');
    }

}
