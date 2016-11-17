<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\User;
use GraftPHP\Framework\Functions;
use GraftPHP\Framework\View;

class SessionController
{

    public function create()
    {
        if ( $test = User::find($_POST['username'], 'username') )
        {
            if (password_verify($_POST['password'], $test->password))
            {
                $_SESSION['userid'] = $test->id;
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
