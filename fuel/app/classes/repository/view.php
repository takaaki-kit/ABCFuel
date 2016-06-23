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

    static public function setNewParam($view,$key,$value)
    {
        return $view->set_safe($key, $value);
    }
}
