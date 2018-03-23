<?php

namespace GraftPHP\Clout\Controllers;

use GraftPHP\Clout\Setting;
use GraftPHP\Framework\Functions;
use GraftPHP\Framework\View;

class SettingController extends CloutController
{
    public function index()
    {
        $this->data['settings'] = Setting::all();

        View::Render('settings.index', $this->data, clout_settings('view_folder'));
    }

    public function update()
    {
        $settings = Setting::all();

        foreach ($settings as $_setting) {
            $_setting->value = $_POST[$_setting->id];
            $_setting->save();
        }

        Functions::redirect(clout_settings('clout_url') . '/settings');
    }
}
