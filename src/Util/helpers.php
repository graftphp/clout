<?php

use GraftPHP\Clout\Setting;
use GraftPHP\Framework\DB;

$clout_settings_array = [];

function clout_settings($setting)
{
    if (DB::tableExists('clout_settings')) {
        if (!isset($GLOBALS['clout_settings_array'][$setting])) {
            $db = new DB();
            $res = $db->table('clout_settings')
                ->where('label', '=', $setting)
                ->get();

            if (!isset($res->first()->value)) {
                try {
                    $value = array_filter(
                        Setting::$db_defaultdata,
                        function ($k) use ($setting) {
                            return $k[1] == $setting;
                        }
                    )[0][2];
                } catch (Exception $e) {
                    dd('Default Setting ' . $setting . ' not found');
                }
                DB::insert(
                    'clout_settings',
                    ['label', 'value'],
                    ['label' => $setting, 'value' => $value]
                );
                $GLOBALS['clout_settings_array'][$setting] = $value;
            } else {
                $GLOBALS['clout_settings_array'][$setting] = $res->first()->value;
            }
        }
        return $GLOBALS['clout_settings_array'][$setting];
    } else {
        try {
            $value = array_filter(
                Setting::$db_defaultdata,
                function ($k) use ($setting) {
                    return $k[1] == $setting;
                }
            )[0][2];
        } catch (Exception $e) {
            dd('Default Setting ' . $setting . ' not found');
        }
        return $value;
    }
}
