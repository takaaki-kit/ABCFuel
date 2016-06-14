<?php

namespace model;

class signup_form extends Model
{
    public function regist()
    {
        $form = Fieldset::forge();
        $form->add('screen_name', 'Screen_name', array('class' => 'screen_name'))
             ->add_rule('required');

        $form->repopulate();

        return $form;
    }
}
