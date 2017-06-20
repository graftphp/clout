<?php

namespace GraftPHP\Clout;

class Settings
{
    private $namespace = __NAMESPACE__ . '\Controllers';

    public $routes = [];

    public function __construct()
    {
        // [url (string), controller (string), method (string)]
        $this->routes = [
            [static::cloutURL() . '', $this->namespace . '\CloutController', 'login'],
            [static::cloutURL() . '/_/{}', $this->namespace . '\CloutController', 'asset'],
            [static::cloutURL() . '/login', $this->namespace . '\SessionController', 'create'],
            [static::cloutURL() . '/logout', $this->namespace . '\SessionController', 'delete'],
            [static::cloutURL() . '/home', $this->namespace . '\CloutController', 'dashboard'],
            [static::cloutURL() . '/sections/{}/{}/delete', $this->namespace . '\RecordController', 'delete'],
            [static::cloutURL() . '/sections/{}/{}/edit', $this->namespace . '\RecordController', 'edit'],
            [static::cloutURL() . '/sections/{}/{}/update', $this->namespace . '\RecordController', 'update'],
            [static::cloutURL() . '/sections/{}/create', $this->namespace . '\RecordController', 'create'],
            [static::cloutURL() . '/sections/{}/store', $this->namespace . '\RecordController', 'store'],
            [static::cloutURL() . '/sections/{}', $this->namespace . '\RecordController', 'show'],
            [static::cloutURL() . '/settings/sections', $this->namespace . '\SectionController', 'index'],
            [static::cloutURL() . '/settings/sections/create', $this->namespace . '\SectionController', 'create'],
            [static::cloutURL() . '/settings/sections/store', $this->namespace . '\SectionController', 'store'],
            [static::cloutURL() . '/settings/sections/{}/delete', $this->namespace . '\SectionController', 'delete'],
            [static::cloutURL() . '/settings/sections/{}/update', $this->namespace . '\SectionController', 'update'],
            [static::cloutURL() . '/settings/sections/{}', $this->namespace . '\SectionController', 'show'],
        ];
    }

    public static function assetFolder()
    {
        return __DIR__ . '/Assets/';
    }

    public static function cloutURL()
    {
        return '/clout';
    }

    public static function viewFolder()
    {
        return __DIR__ . '/Views/';
    }
}
