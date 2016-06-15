<?php

class controller_logout extends Controller_Template
{
    public $template = 'login';
    public function action_index()
    {
        Session::destroy();
        Response::redirect('/login');
    }
}
