<?php

namespace Model;

class Model_Signup_Form extends Model
{
	public function regist()
	{
		$form = Fieldset::forge();
		$form->add('screen_name','Screen_name',array('class' => 'screen_name'))
		     ->add_rule('required');

		$form->repopulate();
		return $form;
	}
}
