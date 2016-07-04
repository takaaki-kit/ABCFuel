<?php

class controller_login extends Controller
{
    public function get_index()
    {
        $user = new LoginUser('','');
        return View::forge('login',['postParams' => $user->get_params()]);
    }

    public function post_index()
    {
        $user = new LoginUser(Input::param('screen_name'),Input::param('password'));
        if ($user->can_login() === false) {
            $view = View::forge('login', ['postParams' => $user->get_params()]);
            $view->set_safe('error', 'IDかパスワードが違います');

            return $view;
        }
        Session::set('id', $user->id());
        Response::redirect('/timeline');
    }
}
