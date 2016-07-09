<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\User;
use GraftPHP\Framework\Functions;
use GraftPHP\Framework\View;

class SessionController
{

    public function create()
    {
        $user = new User();
        if ($test = $user->fetch($_POST['email'])) {
            if (password_verify($_POST['password'], $test['password'])) {
                $_SESSION['userid'] = $test['id'];
                Functions::redirect('/clout/home');
            }
        }
        Functions::redirect('/clout');
    }

    public function delete()
    {
        session_destroy();
        Functions::redirect('/clout');
    }

}