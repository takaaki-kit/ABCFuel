<?php

class repository_view
{
    static public function create_signup_view_with_user_params($params)
    {
        return View::forge('signup', ['user' => $params]);
    }

    static public function create_login_view_with_user_params($params)
    {
        return View::forge('login', ['postParams' => $params]);
    }

    static public function set_new_param($view,$key,$value)
    {
        return $view->set_safe($key, $value);
    }
}
