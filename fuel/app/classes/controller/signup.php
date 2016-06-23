<?php

class controller_signup extends Controller
{
    public function get_index()
    {
        return Repository_View::createSignupViewWithUserParams(Model_User::createUserObject());
    }

    public function post_index()
    {
        $postParams = $this->getPostParams();
        $view = Repository_View::createSignupViewWithUserParams($postParams);
        $result = Model_User::isNotYetExistedScreenName($postParams->screen_name);
        if (!$result) {
            $error = 'そのscreen_nameは既に使用されています';
            $view = Repository_View::setNewParam($view,'error',$error);

            return $view;
        }
        try {
            $postParams->save();
        } catch (\Orm\ValidationFailed $e) {
            $view = Repository_View::setNewParam($view,'error',$e->getMessage());

            return $view;
        }
        Session::set('id', $postParams->id);
        Response::redirect('/timeline');
    }

    private function getPostParams()
    {
        $model = Model_User::forge();
        $model->screen_name = Input::param('screen_name');
        $model->name = Input::param('name');
        $model->password = Input::param('password');
        return $model;
    }
}
