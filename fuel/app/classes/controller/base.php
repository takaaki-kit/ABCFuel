<?php

class controller_base extends Controller
{
    protected $current_user = NULL;

    public function before()
    {
        parent::before();

        if (!$this->current_user()) {
            Response::redirect('/signup');
        }
    }

    protected function current_user()
    {
        if($this->current_user === NULL)
        {
            $this->current_user = Model_User::find(Session::get('id'));
        }
        return $this->current_user;
    }
}
