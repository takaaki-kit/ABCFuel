<?php

class Login
{
    private $id = NULL;

    public function __construct($screen_name,$password)
    {
        $this->screen_name = $screen_name;
        $this->password = $password;
    }

    public function can_login()
    {
        $result =  Model_User::find('first', array(
            'where' => array(
                array('screen_name', $this->screen_name),
                array('password', $this->password),
            ),
        ));

        if(!empty($result)){
            $this->id = $result->id;
            return true;
        }

        return false;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_user_model()
    {
        $user = Model_User::forge();
        $user->screen_name = $this->screen_name;
        $user->password = $this->password;
        return $user;
    }

}
