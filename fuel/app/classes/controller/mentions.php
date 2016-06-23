
<?php

class Controller_mentions extends Controller
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
        $messages = Repository_Modelmessage::message_find_by_mention_desc_by_createdAt(Session::get('id'));

        return View::forge('timeline', array(
            'aaa'      => Session::get('id'),
            'messages' => $messages,
            'user'   => $this->user,
            'type' => 'mentions',
        ));
    }
}
