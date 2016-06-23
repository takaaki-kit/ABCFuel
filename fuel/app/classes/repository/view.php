<?php

class repository_view
{
    static public function createSignupViewWithUserParams($params)
    {
        return View::forge('signup', ['user' => $params]);
    }
}
