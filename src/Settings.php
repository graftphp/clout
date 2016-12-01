<?php

namespace GraftPHP\Clout;

class Settings
{
    private $namespace = __NAMESPACE__ . '\Controllers';

    public $routes = [];

    public function __construct()
    {
        // [url (string), controller (string), method (string)]
        $this->routes[] = [static::cloutURL() . '', $this->namespace . '\CloutController', 'login'];
        $this->routes[] = [static::cloutURL() . '/_/{}', $this->namespace . '\CloutController', 'asset'];
        $this->routes[] = [static::cloutURL() . '/login', $this->namespace . '\SessionController', 'create'];
        $this->routes[] = [static::cloutURL() . '/logout', $this->namespace . '\SessionController', 'delete'];
        $this->routes[] = [static::cloutURL() . '/home', $this->namespace . '\CloutController', 'dashboard'];
        $this->routes[] = [static::cloutURL() . '/sections/{}/{}/delete', $this->namespace . '\RecordController', 'delete'];
        $this->routes[] = [static::cloutURL() . '/sections/{}/{}/edit', $this->namespace . '\RecordController', 'edit'];
        $this->routes[] = [static::cloutURL() . '/sections/{}/{}/update', $this->namespace . '\RecordController', 'update'];
        $this->routes[] = [static::cloutURL() . '/sections/{}/create', $this->namespace . '\RecordController', 'create'];
        $this->routes[] = [static::cloutURL() . '/sections/{}/store', $this->namespace . '\RecordController', 'store'];
        $this->routes[] = [static::cloutURL() . '/sections/{}', $this->namespace . '\RecordController', 'show'];
        $this->routes[] = [static::cloutURL() . '/settings/sections', $this->namespace . '\SectionController', 'index'];
        $this->routes[] = [static::cloutURL() . '/settings/sections/create', $this->namespace . '\SectionController', 'create'];
        $this->routes[] = [static::cloutURL() . '/settings/sections/delete', $this->namespace . '\SectionController', 'delete'];
        $this->routes[] = [static::cloutURL() . '/settings/sections/store', $this->namespace . '\SectionController', 'store'];
        $this->routes[] = [static::cloutURL() . '/settings/sections/update', $this->namespace . '\SectionController', 'update'];
        $this->routes[] = [static::cloutURL() . '/settings/sections/{}', $this->namespace . '\SectionController', 'show'];
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
