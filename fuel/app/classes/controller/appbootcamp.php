<?php


class controller_appbootcamp extends Controller
{
    public function action_signup()
    {
        #		$createForm = new Model_Signup_Form();
    #		$form = $createForm->regist();
    #		$this->template->content->set('form',$form->build(),false);
    return View::forge('signup', array('error_signup_screen_name' => ''));
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
