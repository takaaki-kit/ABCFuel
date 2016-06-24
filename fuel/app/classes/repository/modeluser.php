<?php


class repository_modeluser
{
    public static function create_user_object()
    {
        return Model_User::forge();
    }

    public static function user_find_by_screenName_and_password($screenName, $pass)
    {
        return  Model_User::find('first', array(
            'where' => array(
                array('screen_name', $screenName),
                array('password', $pass),
            ),
        ));
    }

    public static function save($user)
    {
        return $user->save();
    }
}
