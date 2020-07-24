<?php
namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Site;
use GraftPHP\Framework\View;

class SiteController extends CloutController
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['sites'] = Site::all();

        View::Render('settings.sites.list', $this->data, clout_settings('view_folder'));
    }

    public function store()
    {
        if (Site::find($_POST['label'], 'label')) {
            dd('Site already exists:' . htmlentities($_POST['name']));
        }

        $site = new Site();
        $site->label = $_POST['label'];
        $site->save();

        Functions::redirect(clout_settings('clout_url') . '/settings/sites/');
    }
}