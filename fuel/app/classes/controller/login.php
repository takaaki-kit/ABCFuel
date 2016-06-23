<?php

class controller_login extends Controller
{
    public function get_index()
    {
        return Repository_View::createLoginViewWithUserParams(Model_User::createUserObject());
    }
    public function post_index()
    {
        $postParams = $this->getPostParams();
        $login_user = Model_User::user_find_by_screenName_and_password($postParams->screen_name,$postParams->password);
        if (empty($login_user)) {
            $view = Repository_View::createLoginViewWithUserParams($postParams);
            $view = Repository_View::setNewParam($view,'error','IDかパスワードが違います');

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
