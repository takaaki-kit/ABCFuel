<?php

class Controller_timeline extends Controller_Template
{
    public $template = 'timeline';
    public function get_index()
    {
        $user_id = Session::get('id');
        $user    = Model_User::find($user_id);
        if (!$user) {
            Response::redirect('/signup');
        }

        $messages = Model_Message::find('all', array(
            'where' => array(
                array('user_id', $user_id),
            ),
            'order_by'  =>  array('created_at' => 'desc'),
        ));

        return View::forge('timeline', array(
          'aaa'      => $user_id,
          'messages' => $messages,
          'user'     => $user,
          'type'     => 'timeline',
        ));
    }
}
