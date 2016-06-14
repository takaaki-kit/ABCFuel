<?php


class controller_appbootcamp extends Controller_Template
{

  public $template = 'signup';

  public function action_signup()
  {

    $form = Fieldset::forge('fs');
    $form->add('screen_name', 'Screen_name', array('class' => 'screen_name'));
    $form->add('name', 'name', array('class' => 'name'));
    $form->add('password', 'password', array('class' => 'password'));
    $form->add('submit', '', array('class' => 'submit'));

    $view = View::forge('signup', array(
      'screen_name' => '',
      'name' => '',
      'password' => '',
    ));
    $view->set('www',$form->build());
    return $view;
    #return View::forge('signup',array(
    #  'www' => $form->build(),
    #));
    #$view = View::forge('forge');
    #$view->set('fs',$form);
    #return $view;
    #return View::forge('signup', array(
    #  'screen_name' => '',
    #  'name' => '',
    #  'password' => '',
    #));
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

    Response::redirect('/appbootcamp/timeline');
  }

  public function get_timeline()
  {
    return View::forge('timeline');
  }
}
