<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Data;
use GraftPHP\Clout\Field;
use GraftPHP\Clout\FieldType;
use GraftPHP\Clout\Record;
use GraftPHP\Clout\Relation;
use GraftPHP\Clout\Relationship;
use GraftPHP\Clout\Section;
use GraftPHP\Clout\Setting;
use GraftPHP\Clout\User;
use GraftPHP\Framework\Functions;
use GraftPHP\Framework\View;

class CloutController
{
    public function __construct()
    {
        if (!isset($_SESSION['userid'])) {
            if (
                $_SERVER['REQUEST_URI'] != clout_settings('clout_url')
                && $_SERVER['REQUEST_URI'] != clout_settings('clout_url') . '/login'
                && substr($_SERVER['REQUEST_URI'], 0, strlen(clout_settings('storage_url'))) != clout_settings('storage_url')
            ) {
                Functions::redirect(clout_settings('clout_url'));
            }
        }

        if (
            (!isset(GRAFT_CONFIG['DBHost']) || empty(GRAFT_CONFIG['DBHost'])) ||
            (!isset(GRAFT_CONFIG['DBName']) || empty(GRAFT_CONFIG['DBName'])) ||
            (!isset(GRAFT_CONFIG['DBUser']) || empty(GRAFT_CONFIG['DBUser']))
        ) {
            dd('A database connection is required to run clout.');
        }

        // instance everything to check/set db once per session
        if (!isset($_SESSION['clout_boot'])) {
            Data::build();
            Field::build();
            FieldType::build();
            Record::build();
            Relation::build();
            Relationship::build();
            Setting::build();
            Section::build();
            User::build();
            $_SESSION['clout_boot'] = true;
        }

        $this->data['sections'] = Section::all();
    }

    public function asset($file)
    {
        $path = clout_settings('asset_folder') . $file;
        $info = pathinfo($path);
        header_remove();
        switch ($info['extension']) {
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
        View::Render('home', $this->data, clout_settings('view_folder'));
    }

    public function login()
    {
        if (isset($_SESSION['userid'])) {
            Functions::redirect(clout_settings('clout_url') . '/home');
        }

        View::Render('login', $this->data, clout_settings('view_folder'));
    }
}
