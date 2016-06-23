<?php

class repository_view
{
    static public function createSignupViewWithUserParams($params)
    {
        return View::forge('signup', ['user' => $params]);
    }

    static public function createLoginViewWithUserParams($params)
    {
        return View::forge('login', ['postParams' => $params]);
    }
}
