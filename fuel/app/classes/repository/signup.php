<?php

class Signup
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
        $user->screen_name = $this->screen_name;
        $user->name = $this->name;
        $user->password = $this->password;
        try {
            $user->save();
        } catch (\Orm\validationFailed $e) {
            return false;
        }
        $this->id = $user->id;
        return true;
    }

    public function get_id()
    {
        return $this->id;
    }
}
