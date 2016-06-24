<?php

class controller_base extends Controller
{
    private $current_user;

    public function before()
    {
        parent::before();

        $this->current_user = Model_User::find(Session::get('id'));
        if (!$this->current_user) {
            Response::redirect('/signup');
        }

    }

    public function current_user()
    {
        return $this->current_user;
    }
}
