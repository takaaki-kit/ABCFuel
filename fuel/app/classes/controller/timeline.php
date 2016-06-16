<?php

class controller_timeline extends Controller
{
    private $user;

    public function before()
    {
        $user = Model_User::find(Session::get('id'));
        if (!$user) {
            Response::redirect('/signup');
        }
        $this->user = $user;
    }

    public function get_index()
    {
        $messages = Model_Message::find('all', array(
            'where' => array(
                array('user_id', Session::get('id')),
            ),
            'order_by' => array('created_at' => 'desc'),
        ));

        return View::forge('timeline', array(
          'aaa'      => Session::get('id'),
          'messages' => $messages,
          'user'     => $this->user,
          'type'     => 'timeline',
        ));
    }
}
