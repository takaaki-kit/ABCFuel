<?php

class Login
{
    public function __construct($screen_name,$password)
    {
        $this->screen_name = $screen_name;
        $this->password = $password;
    }
    public function can_login()
    {
        return  Model_User::find('first', array(
            'where' => array(
                array('screen_name', $this->screen_name),
                array('password', $this->password),
            ),
        ));
    }
}
