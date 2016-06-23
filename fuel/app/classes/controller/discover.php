
<?php

class controller_discover extends Controller
{
    private $user;

    public function before()
    {
        $this->user = Model_User::find(Session::get('id'));
        if (!$this->user) {
            Response::redirect('/signup');
        }
    }

    public function get_index()
    {
        $messages = Repository_Modelmessage::message_find_all();

        return View::forge('timeline', array(
            'aaa'      => Session::get('id'),
            'messages' => $messages,
            'user'     => $this->user,
            'type'     => 'discover',
    ));
    }
}
