<?php

class controller_signup extends Controller
{
    public function get_index()
    {
        return Repository_View::createSignupViewWithUserParams(Repository_Modeluser::createUserObject());
    }

    public function post_index()
    {
        $postParams = $this->getPostParams();
        $view = Repository_View::createSignupViewWithUserParams($postParams);
        if (Repository_Modeluser::isExistedScreenName($postParams->screen_name)) {
            $view = Repository_View::setNewParam($view, 'error', 'そのscreen_nameはすでに使用されています');

            return $view;
        }
        try {
            Repository_Modeluser::save($postParams);
        } catch (\Orm\ValidationFailed $e) {
            $view = Repository_View::setNewParam($view, 'error', $e->getMessage());

            return $view;
        }
        Session::set('id', $postParams->id);
        Response::redirect('/timeline');
    }

    private function getPostParams()
    {
        $model = Repository_Modeluser::createUserObject();
        $model->screen_name = Input::param('screen_name');
        $model->name = Input::param('name');
        $model->password = Input::param('password');

        return $model;
    }
}
