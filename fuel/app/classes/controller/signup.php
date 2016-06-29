<?php

class controller_signup extends Controller
{
    private $user;

    public function get_index()
    {
        $this->user = new SignupUser('','','');
        return View::forge('signup', ['user' => $this->user->get_params()]);
    }

    public function post_index()
    {
        $this->user = new SignupUser(Input::param('screen_name'),Input::param('name'),Input::param('password'));
        try {
            $this->user->save();
        } catch (Orm\ValidationFailed $e) {
            $view = View::forge('signup', ['user' => $this->user->get_params()]);
            $view->set_safe('error',$e->get_fieldset()->validation()->error());

            return $view;
        }
        Session::set('id', $this->user->get_id());
        Response::redirect('/timeline');
    }
}
