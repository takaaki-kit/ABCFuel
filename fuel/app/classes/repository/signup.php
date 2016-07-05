<?php

class SignupUser
{
    public function __construct($screen_name = '', $name = '', $password = '')
    {
        $this->user = Model_User::forge();
        $this->user->screen_name = $screen_name;

        $this->user->name = $name;

        $this->user->password = $password;
    }

    public function save()
    {
        $this->user->save();

        return true;
    }

    public function attribute()
    {
        return $this->user;
    }
}
