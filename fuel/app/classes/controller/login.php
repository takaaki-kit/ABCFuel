<?php


class Controller_Login extends Controller
{
    public function get_index()
    {
        return Repository_View::create_login_view_with_user_params(Repository_Modeluser::create_user_object());
    }
    public function post_index()
    {
        $postParams = $this->get_post_params();
        $login_user = Repository_Modeluser::user_find_by_screenName_and_password($postParams->screen_name, $postParams->password);
        if (empty($login_user)) {
            $view = Repository_View::create_login_view_with_user_params($postParams);
            $view = Repository_View::set_new_param($view, 'error', 'IDかパスワードが違います');

            return $view;
        }
        Session::set('id', $login_user->id);
        Response::redirect('/timeline');
    }

    private function get_post_params()
    {
        $user = Repository_Modeluser::create_user_object();
        $user->screen_name = Input::param('screen_name');
        $user->password = Input::param('password');

        return $user;
    }
}
