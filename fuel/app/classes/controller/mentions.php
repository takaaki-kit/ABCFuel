<?php

class Controller_Mentions extends Controller_Base
{
    private $user;

    public function get_index()
    {
        $messages = Message::find_by_mention_desc_by_createdAt(Session::get('id'));

        return View::forge('timeline', array(
            'messages' => $messages,
            'user'     => $this->current_user(),
        ));
    }
}
