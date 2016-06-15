
<?php

class controller_mentions extends Controller_Template
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
                array('mention', $user_id),
            ),
        ));

        return View::forge('timeline', array(
            'aaa'  => var_dump($messages),
            'type' => 'mentions',
        ));
    }
}
