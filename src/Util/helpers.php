<?php

use GraftPHP\Clout\Settings;
use GraftPHP\Framework\DB;

$clout_settings_array = [];

function clout_settings($setting)
{
	if (!isset($GLOBALS['clout_settings_array'][$setting])) {
		$db = new DB();
        $res = $db->table('clout_settings')
            ->where('label', '=', $setting)
            ->get();

		if (!isset($res->first()->value)) {
			dd('setting not found "' . $setting . '"');
		} else {
			$GLOBALS['clout_settings_array'][$setting] = $res->first()->value;
		}
	}
	return $GLOBALS['clout_settings_array'][$setting];
}
