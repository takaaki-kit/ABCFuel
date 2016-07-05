<?php

class User
{
    public static function find_by_screenName_and_password($screenName, $pass)
    {
        return  Model_User::find('first', array(
            'where' => array(
                array('screen_name', $screenName),
                array('password', $pass),
            ),
        ));
    }
}
