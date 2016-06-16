<?php

class model_message extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'user_id',
        'text',
        'mention',
        'image',
        'deleted',
        'created_at',
        'updated_at',
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );

    protected static $_table_name = 'messages';

    static public function message_find_by_userId_desc_by_createdAt($user_id)
    {
        return Model_Message::find('all', array(
            'where' => array(
                array('user_id', $user_id),
            ),
            'order_by' => array('created_at' => 'desc'),
        ));
    }

    static public function message_find_all()
    {
        return Model_Message::find('all');
    }

    static public function message_find_by_mention_desc_by_createdAt($login_user_id)
    {
        return Model_Message::find('all', array(
            'where' => array(
                array('mention', $login_user_id),
            ),
        ));
    }
}
