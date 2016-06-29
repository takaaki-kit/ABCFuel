<?php

class controller_login extends Controller
{
    private $user;

    public function get_index()
    {
        $this->user = new LoginUser('','');
        return View::forge('login',['postParams' => $this->user->get_params()]);
    }

    public function post_index()
    {
        $this->user = new LoginUser(Input::param('screen_name'),Input::param('password'));
        if ($this->user->can_login() === false) {
            $view = View::forge('login', ['postParams' => $this->user->get_params()]);
            $view->set_safe('error', 'IDかパスワードが違います');

            return $view;
        }
        Session::set('id', $this->user->get_id());
        Response::redirect('/timeline');
    }
}
