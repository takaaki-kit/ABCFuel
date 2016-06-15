
<?php

class controller_discover extends Controller_Template
{
    public $template = 'timeline';
    public function get_index()
    {
        $user_id = Session::get('id');
        $user    = Model_User::find($user_id);
        if (!$user) {
            Response::redirect('/signup');
        }
        $messages = Model_Message::find('all');

        return View::forge('timeline', array(
            'aaa'  => var_dump($messages),
            'type' => 'discover',
    ));
    }
}
