<?php

class model_user extends \Orm\Model
{
    protected static $_properties = array(
    'id',
    'screen_name' => array(
      'validation' => array(
        'required',
        'uniqueness',
      ),
    ),
    'name' => array(
      'validation' => array(
        'required',
      ),
    ),
    'password' => array(
      'validation' => array(
        'required',
      ),
    ),
    'image',
    'text',
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
    'Orm\Observer_validation' => array(
      'events' => array('before_insert', 'before_save'),
    ),
  );

    protected static $_table_name = 'users';

}
