<?php


class controller_appbootcamp extends Controller_Template
{
  public $template = 'signup';

  public function action_signup()
  {
    return View::forge('signup', array(
      'screen_name' => '',
      'name' => '',
      'password' => '',
    ));
  }

  public function post_signup()
  {
    $model = Model_User::forge();
    $view = View::forge('signup',array(
      'screen_name' => Input::param('screen_name'),
      'name' => Input::param('name'),
      'password' => Input::param('password'),
    ));
    $model->screen_name = Input::param('screen_name');
    $model->name = Input::param('name');
    $model->password = Input::param('password');

    try {
      $model->save();
    } catch (\Orm\ValidationFailed $e) {
      return $view;
    }

    Session::set('id',$model->id);
    Response::redirect('/appbootcamp/timeline');
  }

  public function get_timeline()
  {
    $user_id = Session::get('id');
    $user = Model_User::find($user_id);
    if(!$user) {
      Response::redirect('/appbootcamp/signup');
    }
    return View::forge('timeline');
  }
}
