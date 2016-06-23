<?php

require_once('fuel/app/classes/model/user.php');

class Repository_ModelUserAccess
{
    static public function createUserObject()
    {
        return Model_User::forge();
    }

    static public function user_find_by_screenName_and_password($screenName,$pass)
    {
        return  Model_User::find('first', array(
            'where' => array(
                array('screen_name', $screenName),
                array('password', $pass),
            ),
        ));
    }

    static public function isExistedScreenName($check)
    {
        $result = Model_User::find('all', array(
      'where' => array(
        array('screen_name', $check),
      ),
    ));

        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }
}
