<?php

class controller_timeline extends Controller_Base
{
    private $user;

    public function get_index()
    {
        $messages = Message::find_by_userId_desc_by_createdAt(Session::get('id'));

        return View::forge('timeline', array(
            'messages' => $messages,
            'user'   => $this->current_user(),
        ));
    }
}
