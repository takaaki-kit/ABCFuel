<?php

class controller_signup extends Controller
{
    public function get_index()
    {
        $user = $this->get_signup_user_instance();
        return View::forge('signup', ['user' => $user->get_user_model()]);
    }

    public function post_index()
    {
        $user = $this->get_signup_user_instance();
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

    private function get_signup_user_instance()
    {
        return new SignupUser(Input::param('screen_name'),Input::param('name'),Input::param('password'));
    }
}
