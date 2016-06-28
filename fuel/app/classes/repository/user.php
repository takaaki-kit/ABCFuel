<?php


class User
{
    static public function create_user_object()
    {
        return Model_User::forge();
    }

    static public function find_by_screenName_and_password($screenName,$pass)
    {
        return  Model_User::find('first', array(
            'where' => array(
                array('screen_name', $screenName),
                array('password', $pass),
            ),
        ));
    }

    static public function save($user)
    {
        return $user->save();
    }

}
