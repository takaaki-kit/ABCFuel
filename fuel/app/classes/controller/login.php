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
        #$postParams = $this->get_post_params();
        #$login_user = User::find_by_screenName_and_password($postParams->screen_name, $postParams->password);
        if ($user->can_login() === NULL) {
            $view = View::forge('login', ['postParams' => $postParams]);
            $view->set_safe('error', 'IDかパスワードが違います');

            return $view;
        }
        Session::set('id', $login_user->id);
        Response::redirect('/timeline');
    }

    #private function get_post_params()
    #{
    #    $user = User::create_user_object();
    #    $user->screen_name = Input::param('screen_name');
    #    $user->password = Input::param('password');

    #    return $user;
    #}
}
