<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'screen_name' => array(
			'validation' => array(
				'required'
			),
		),
		'name' => array(
			'validation' => array(
				'required'
			),
),
		'password',
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
			'events' => array('before_insert','before_save')
		)
	);

	protected static $_table_name = 'users';


	public function isNotYetExistedScreenName($check)
	{
		$result = Model_User::find('all',array(
			'where' => array(
				array('screen_name',$check),
			),
		));

		if(empty($result)){return true;}
		else{return false;}
	}

}
