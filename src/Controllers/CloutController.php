<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Section;
use GraftPHP\Clout\Settings;
use GraftPHP\Framework\Functions;
use GraftPHP\Framework\View;

class CloutController
{

    public function __construct()
    {
        // instance everything so the db gets setup
        // probably need a better way to do this
        // in the future #TODO
        \GraftPHP\Clout\Field::build();
        \GraftPHP\Clout\FieldType::build();
        \GraftPHP\Clout\Section::build();
        \GraftPHP\Clout\User::build();

        $this->data['sections'] = Section::all();
    }

    public function dashboard()
    {
        View::Render('home', $this->data, Settings::viewFolder());
    }

    public function login()
    {
        if (isset($_SESSION['userid'])) {
            Functions::redirect('/clout/home');
        }

        View::Render('login', $this->data, Settings::viewFolder());
    }

}
