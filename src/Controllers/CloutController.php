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
        if (GRAFT_CONFIG['DBHost'] == '' ||
            GRAFT_CONFIG['DBName'] == '' ||
            GRAFT_CONFIG['DBUser'] == '') {
            die('A database connection is required to run clout.');
        }

        // instance everything so the db gets setup
        // probably need a better way to do this
        // in the future #TODO
        \GraftPHP\Clout\Data::build();
        \GraftPHP\Clout\Field::build();
        \GraftPHP\Clout\FieldType::build();
        \GraftPHP\Clout\Record::build();
        \GraftPHP\Clout\Relationship::build();
        \GraftPHP\Clout\Section::build();
        \GraftPHP\Clout\User::build();

        $this->data['sections'] = Section::all();
    }

    public function asset($file)
    {
        $path = Settings::assetFolder() . $file;
        $info = pathinfo($path);
        header_remove();
        switch($info['extension']) {
            case 'css':
                header('Content-Type: text/css');
            break;
            default:
                header('Content-type: ' . mime_content_type($path));
            break;
        }
        readfile($path);
        die();
    }

    public function dashboard()
    {
        View::Render('home', $this->data, Settings::viewFolder());
    }

    public function login()
    {
        if (isset($_SESSION['userid'])) {
            Functions::redirect(Settings::cloutURL() . '/home');
        }

        View::Render('login', $this->data, Settings::viewFolder());
    }

}
