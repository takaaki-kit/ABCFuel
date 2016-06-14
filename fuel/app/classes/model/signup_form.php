<?php


class model_signup_form extends Model
{
  public function regist()
  {
    $form = Fieldset::forge();
    $form->add('screen_name', 'Screen_name', array('class' => 'screen_name'));
    $form->add('name', 'name', array('class' => 'name'));
    $form->add('password', 'password', array('class' => 'password'));
    $form->add('submit', '', array('class' => 'submit'));

    return $form;
  }
}
