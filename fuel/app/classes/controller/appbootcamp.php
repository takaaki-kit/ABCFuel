<?php

 
class Controller_Appbootcamp extends Controller
{
	public function action_signup()
	{
#		$createForm = new Model_Signup_Form();
#		$form = $createForm->regist();
#		$this->template->content->set('form',$form->build(),false);
		return View::forge('signup',array('error_signup_screen_name' => ""));
	}

	public function post_signup()
	{
		$model = Model_User::forge();
		$check = Input::param('screen_name');
		$result = $model->isNotYetExistedScreenName($check);
		$model->screen_name = 'www';
		$model->name = NULL;
		$model->password = Input::param('password');

		try{
			$model->save();
		} catch(Exception $e) {
			return View::forge('signup',array('error_signup_screen_name' => $e->getMessage()));
		}
		
		Response::redirect('/appbootcamp/timeline');
	}	

	public function action_timeline()
	{
		return View::forge('timeline');
	}
}
