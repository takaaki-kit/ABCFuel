<?php

class controller_signup extends Controller
{
    public function get_index()
    {
        return Repository_View::create_signup_view_with_user_params(Repository_Modeluser::create_user_object());
    }

    public function post_index()
    {
        $postParams = $this->get_post_params();
        $view = Repository_View::create_signup_view_with_user_params($postParams);
        try {
            Repository_Modeluser::save($postParams);
        } catch (\Orm\ValidationFailed $e) {
            $view = Repository_View::set_new_param($view, 'error', $e->get_fieldset()->validation()->error());

            return $view;
        }
        Session::set('id', $postParams->id);
        Response::redirect('/timeline');
    }

    private function get_post_params()
    {
        $model = Repository_Modeluser::create_user_object();
        $model->screen_name = Input::param('screen_name');
        $model->name = Input::param('name');
        $model->password = Input::param('password');

        return $model;
    }
}
