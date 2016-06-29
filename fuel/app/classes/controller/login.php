<?php

class controller_login extends Controller
{
    public function get_index()
    {
        $user = $this->get_login_user_instance();
        return View::forge('login',['postParams' => $user->get_user_model()]);
    }

    public function post_index()
    {
        $user = $this->get_login_user_instance();
        if ($user->can_login() === false) {
            $view = View::forge('login', ['postParams' => $user->get_user_model()]);
            $view->set_safe('error', 'IDかパスワードが違います');

            return $view;
        }
        Session::set('id', $user->get_id());
        Response::redirect('/timeline');
    }

    private function get_login_user_instance()
    {
        return new LoginUser(Input::param('screen_name'),Input::param('password'));
    }
}
