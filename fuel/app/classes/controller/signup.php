<?php

class controller_signup extends Controller
{
    public function get_index()
    {
        $user = new SignupUser();
        return View::forge('signup', ['user' => $user->attribute()]);
    }

    public function post_index()
    {
        $user = new SignupUser(Input::param('screen_name'),Input::param('name'),Input::param('password'));
        try {
            $user->save();
        } catch (Orm\ValidationFailed $e) {
            $view = View::forge('signup', ['user' => $user->attribute()]);
            $view->set_safe('error',$e->get_fieldset()->validation()->error());

            return $view;
        }
        Session::set('id', $user->id());
        Response::redirect('/timeline');
    }
}
