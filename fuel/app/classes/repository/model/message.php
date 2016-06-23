<?php

namespace M;

class Message
{
    public static function message_find_by_userId_desc_by_createdAt($user_id)
    {
        return Model_Message::find('all', array(
            'where' => array(
                array('user_id', $user_id),
            ),
            'order_by' => array('created_at' => 'desc'),
        ));
    }

    public static function message_find_all()
    {
        return Model_Message::find('all');
    }

    public static function message_find_by_mention_desc_by_createdAt($login_user_id)
    {
        return Model_Message::find('all', array(
            'where' => array(
                array('mention', $login_user_id),
            ),
        ));
    }
}
