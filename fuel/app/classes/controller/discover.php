<?php

class controller_discover extends Controller_Base
{
    private $user;

    public function get_index()
    {
        $messages = Message::find_all();

        return View::forge('timeline', array(
            'messages' => $messages,
            'user'     => $this->current_user(),
        ));
    }
}
