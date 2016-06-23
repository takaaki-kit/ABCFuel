<?php

class controller_signup extends Controller
{
    public function get_index()
    {
        return View::forge('signup', ['user' => Model_User::forge()]);
    }

    public function post_index()
    {
        $model = Model_User::forge();
        $model->screen_name = Input::param('screen_name');
        $model->name = Input::param('name');
        $model->password = Input::param('password');
        $view = View::forge('signup', ['user' => $model]);
        $result = Model_User::isNotYetExistedScreenName($model->screen_name);
        if (!$result) {
            $error = 'そのscreen_nameは既に使用されています';
            $view->set('error', $error);

            return $view;
        }
        try {
            $model->save();
        } catch (\Orm\ValidationFailed $e) {
            $view->set_safe('error', $e->getMessage());

            return $view;
        }
        Session::set('id', $model->id);
        Response::redirect('/timeline');
    }
}
