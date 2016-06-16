<?php

class controller_login extends Controller
{
    public function get_index()
    {
        return View::forge('login',['user' => Model_User::forge()]);
    }
    public function post_index()
    {

        $model = Model_User::forge();
        $model->screen_name = Input::param('screen_name');
        $model->password = Input::param('password');
        $user = Model_User::user_find_by_screenName_and_password($model->screen_name,$model->password);
        $view = View::forge('login', ['user' => $model]);
        if (empty($user)) {
            $error = 'invalid input';
            $view->set('error', $error);

            return $view;
        }
        Session::set('id', $user->id);
        Response::redirect('/timeline');
    }
}
