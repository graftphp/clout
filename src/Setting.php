<?php

namespace GraftPHP\Clout;

use GraftPHP\Framework\Model;

class Setting extends Model
{
    private $namespace = __NAMESPACE__ . '\Controllers';

    public static $db_tablename = 'clout_settings';
    public static $db_idcolumn = 'id';
    public $routes = [];

    public static $db_columns = [
        ['label', 'varchar(255)'],
        ['value', 'varchar(255)'],
    ];

    public static $db_defaultdata = [
        //[id, label, value]
        ['1', 'clout_url', '/clout'],
        ['2', 'view_folder', __DIR__ . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR],
        ['3', 'storage_path', __DIR__ . DIRECTORY_SEPARATOR . '_' . DIRECTORY_SEPARATOR . 'clout' . DIRECTORY_SEPARATOR],
        ['4', 'storage_url', '/_/clout/'],
        ['5', 'asset_folder', __DIR__ . '/Assets/'],
        ['6', 'wysiwyg_config', 'undo redo | bold italic underline | link | alignleft aligncenter alignright | bullist numlist | table'],
    ];

    public function __construct()
    {
        // dd(clout_settings('clout_url'));
        // [url (string), controller (string), method (string)]
        $this->routes = [
            [clout_settings('clout_url') . '', $this->namespace . '\CloutController', 'login'],
            [clout_settings('clout_url') . '/_/{}', $this->namespace . '\CloutController', 'asset'],
            [clout_settings('clout_url') . '/home', $this->namespace . '\CloutController', 'dashboard'],
            [clout_settings('clout_url') . '/login', $this->namespace . '\SessionController', 'create'],
            [clout_settings('clout_url') . '/logout', $this->namespace . '\SessionController', 'delete'],
            [clout_settings('clout_url') . '/upload/{}/{}', $this->namespace . '\UploadController', 'upload'],
            [clout_settings('clout_url') . '/sections/{}/{}/delete', $this->namespace . '\RecordController', 'delete'],
            [clout_settings('clout_url') . '/sections/{}/{}/edit', $this->namespace . '\RecordController', 'edit'],
            [clout_settings('clout_url') . '/sections/{}/{}/update', $this->namespace . '\RecordController', 'update'],
            [clout_settings('clout_url') . '/sections/{}/create', $this->namespace . '\RecordController', 'create'],
            [clout_settings('clout_url') . '/sections/{}/store', $this->namespace . '\RecordController', 'store'],
            [clout_settings('clout_url') . '/sections/{}', $this->namespace . '\RecordController', 'show'],
            [clout_settings('clout_url') . '/settings', $this->namespace . '\SettingController', 'index'],
            [clout_settings('clout_url') . '/settings/update', $this->namespace . '\SettingController', 'update'],
            [clout_settings('clout_url') . '/settings/sections', $this->namespace . '\SectionController', 'index'],
            [clout_settings('clout_url') . '/settings/sections/create', $this->namespace . '\SectionController', 'create'],
            [clout_settings('clout_url') . '/settings/sections/store', $this->namespace . '\SectionController', 'store'],
            [clout_settings('clout_url') . '/settings/sections/{}/delete', $this->namespace . '\SectionController', 'delete'],
            [clout_settings('clout_url') . '/settings/sections/{}/update', $this->namespace . '\SectionController', 'update'],
            [clout_settings('clout_url') . '/settings/sections/{}', $this->namespace . '\SectionController', 'show'],
            [clout_settings('clout_url') . '/settings/users', $this->namespace . '\UserController', 'index'],
            [clout_settings('clout_url') . '/settings/users/create', $this->namespace . '\UserController', 'create'],
            [clout_settings('clout_url') . '/settings/users/store', $this->namespace . '\UserController', 'store'],
            [clout_settings('clout_url') . '/settings/users/{}/delete', $this->namespace . '\UserController', 'delete'],
            [clout_settings('clout_url') . '/settings/users/{}/update', $this->namespace . '\UserController', 'update'],
            [clout_settings('clout_url') . '/settings/users/{}', $this->namespace . '\UserController', 'edit'],
        ];
    }

}
