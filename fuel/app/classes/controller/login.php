<?php

class controller_login extends Controller
{
    public function get_index()
    {
        return View::forge('login',['postParams' => Model_User::createUserObject()]);
    }
    public function post_index()
    {
        $postParams = $this->getPostParams();
        $login_user = Model_User::user_find_by_screenName_and_password($postParams->screen_name,$postParams->password);
        if (empty($login_user)) {
            $error = 'IDかパスワードが違います';
            $view = View::forge('login', ['postParams' => $postParams]);
            $view->set('error', $error);

            return $view;
        }
        Session::set('id', $login_user->id);
        Response::redirect('/timeline');
    }

    private function getPostParams(){
        $user = Model_User::forge();
        $user->screen_name = Input::param('screen_name');
        $user->password = Input::param('password');

        return $user;
    }
}
