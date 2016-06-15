<?php

class controller_appbootcamp extends Controller_Template
{
    public $template = 'signup';
    public function action_signup()
    {
        return View::forge('signup', array(
            'screen_name' => '',
            'name'        => '',
            'password'    => '',
        ));
    }
    public function post_signup()
    {
        $model = Model_User::forge();
        $view  = View::forge('signup', array(
           'screen_name' => Input::param('screen_name'),
           'name'        => Input::param('name'),
           'password'    => Input::param('password'),
        ));
        $model->screen_name = Input::param('screen_name');
        $model->name        = Input::param('name');
        $model->password    = Input::param('password');
        try {
            $model->save();
        } catch (\Orm\ValidationFailed $e) {
            return $view;
        }
        Session::set('id', $model->id);
        Response::redirect('/appbootcamp/timeline');
    }
    public function get_timeline()
    {
        $user_id = Session::get('id');
        $user    = Model_User::find($user_id);
        if (!$user) {
            Response::redirect('/appbootcamp/signup');
        }

        $messages = Model_Message::find('all',array(
            'where' =>  array(
                array('user_id',$user_id),
            )
        ));

        return View::forge('timeline', array(
          'aaa' => var_dump($messages),
          'type'  =>  'timeline'
        ));
    }
    public function get_login()
    {
        return View::forge('login', array(
    ));
    }
    public function post_login()
    {
        $user = Model_User::find('first', array(
          'where' => array(
              array('screen_name', Input::param('screen_name')),
              array('password', Input::param('password')),
      ),
    ));
        if (empty($user)) {
            Response::redirect('/appbootcamp/login');
        }
        Session::set('id', $user->id);
        Response::redirect('/appbootcamp/timeline');
    }
    public function action_logout()
    {
        Session::destroy();
        Response::redirect('/appbootcamp/login');
    }

    public function get_discover()
    {
        $user_id = Session::get('id');
        $user    = Model_User::find($user_id);
        if (!$user) {
            Response::redirect('/appbootcamp/signup');
        }
        $messages = Model_Message::find('all');

        return View::forge('timeline', array(
          'aaa' => var_dump($messages),
          'type'  =>  'discover'
        ));
    }
    public function get_mentions()
    {
        $user_id = Session::get('id');
        $user    = Model_User::find($user_id);
        if (!$user) {
            Response::redirect('/appbootcamp/signup');
        }

        return View::forge('timeline', array(
          'aaa' => $user_id,
          'type'  =>  'mentions'
        ));
    }
}
