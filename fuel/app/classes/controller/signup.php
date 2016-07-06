<?php

class controller_signup extends Controller
{
    public function get_index()
    {
        $user = new SignupUser();

        return View::forge('signup', ['post_params' => $user->attribute()]);
    }

    public function post_index()
    {
        $user = new SignupUser(Input::param('screen_name'), Input::param('name'), Input::param('password'));
        try {
            $user->save();
        } catch (Orm\ValidationFailed $e) {
            $view = View::forge('signup', ['post_params' => $user->attribute()]);
            $view->set_safe('error', $e->get_fieldset()->validation()->error());

            return $view;
        }
        Session::set('id', $user->attribute()->id);
        Response::redirect('/timeline');
    }
}
