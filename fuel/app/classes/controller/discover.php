
<?php

class controller_discover extends Controller
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
        $messages = Model_Message::find('all');

        return View::forge('timeline', array(
            'aaa'      => Session::get('id'),
            'messages' => $messages,
            'user'     => $this->user,
            'type'     => 'discover',
    ));
    }
}
