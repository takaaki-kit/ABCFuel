<?php

class LoginUser
{
    private $id;

    public function __construct($screen_name, $password)
    {
        $this->screen_name = $screen_name;
        $this->password = $password;
    }

    public function can_login()
    {
        $result = User::find_by_screenName_and_password($this->screen_name,$this->password);

        if ($result === NULL) {
            return false;
        }
        $this->id = $result->id;

        return true;
    }

    public function id()
    {
        return $this->id;
    }

    public function get_params()
    {
        $user = Model_User::forge();
        $user->screen_name = $this->screen_name;
        $user->password = $this->password;

        return $user;
    }
}
