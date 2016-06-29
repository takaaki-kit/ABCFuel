<?php

class SignupUser
{
    private $id;

    public function __construct($screen_name,$name,$password)
    {
        $this->screen_name = $screen_name;
        $this->name = $name;
        $this->password = $password;
    }

    public function save()
    {
        $user = Model_User::forge();
        $this->set_params($user);
        $user->save();
        $this->id = $user->id;
        return true;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_params()
    {
        $user = Model_User::forge();
        $this->set_params($user);
        return $user;
    }

    private function set_params($user)
    {
        $user->screen_name = $this->screen_name;
        $user->name = $this->name;
        $user->password = $this->password;
    }
}
