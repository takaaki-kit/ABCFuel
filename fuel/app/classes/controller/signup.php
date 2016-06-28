<?php

class controller_signup extends Controller
{
    public function get_index()
    {
        return View::forge('signup', ['user' => User::create_user_object()]);
    }

    public function post_index()
    {
        $user = new Signup(Input::param('screen_name'),Input::param('name'),Input::param('password'));
        try {
            $user->save();
        } catch (Orm\ValidationFailed $e) {
            $view = View::forge('signup', ['user' => $user->get_user_model()]);
            $view->set_safe('error',$e->get_fieldset()->validation()->error());

            return $view;
        }
        Session::set('id', $user->get_id());
        Response::redirect('/timeline');
    }
}
