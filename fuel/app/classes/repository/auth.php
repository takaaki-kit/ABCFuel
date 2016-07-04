<?php

class auth
{
    public function __construct($screen_name = '', $password = '')
    {
        $this->user = Model_User::forge();
        $this->user->screen_name = $screen_name;
        $this->user->password = $password;
    }

    public function enable()
    {
        $result = User::find_by_screenName_and_password($this->user->screen_name, $this->user->password);

        if ($result === null) {
            return false;
        }

        $this->user = $result;

        return true;
    }

    public function id()
    {
        return $this->user->id;
    }

    public function get_params()
    {
        return $this->user;
    }
}
