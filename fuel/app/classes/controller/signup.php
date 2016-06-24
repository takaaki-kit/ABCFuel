<?php

class controller_signup extends Controller
{
    public function get_index()
    {
        return View::forge('signup', ['user' => User::create_user_object()]);
    }

    public function post_index()
    {
        $postParams = $this->get_post_params();
        $view = View::forge('signup', ['user' => $postParams]);
        try {
            User::save($postParams);
        } catch (\Orm\ValidationFailed $e) {
            $view->set_safe('error',$e->get_fieldset()->validation()->error());

            return $view;
        }
        Session::set('id', $postParams->id);
        Response::redirect('/timeline');
    }

    private function get_post_params()
    {
        $model = User::create_user_object();
        $model->screen_name = Input::param('screen_name');
        $model->name = Input::param('name');
        $model->password = Input::param('password');

        return $model;
    }
}
