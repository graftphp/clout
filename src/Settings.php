<?php

namespace GraftPHP\Clout;

class Settings
{

    private $namespace = 'GraftPHP\Clout\Controllers';

    public $routes = [];

    public function __construct()
    {
        // [url (string), controller (string), method (string)]
        $this->routes[] = ['/clout', $this->namespace . '\CloutController', 'login'];
        $this->routes[] = ['/clout/login', $this->namespace . '\SessionController', 'create'];
        $this->routes[] = ['/clout/logout', $this->namespace . '\SessionController', 'delete'];
        $this->routes[] = ['/clout/home', $this->namespace . '\CloutController', 'dashboard'];
        $this->routes[] = ['/clout/sections/{}/create', $this->namespace . '\RecordController', 'create'];
        $this->routes[] = ['/clout/sections/{}', $this->namespace . '\RecordController', 'show'];
        $this->routes[] = ['/clout/settings/sections', $this->namespace . '\SectionController', 'index'];
        $this->routes[] = ['/clout/settings/sections/create', $this->namespace . '\SectionController', 'create'];
        $this->routes[] = ['/clout/settings/sections/delete', $this->namespace . '\SectionController', 'delete'];
        $this->routes[] = ['/clout/settings/sections/edit', $this->namespace . '\SectionController', 'edit'];
        $this->routes[] = ['/clout/settings/sections/store', $this->namespace . '\SectionController', 'store'];
        $this->routes[] = ['/clout/settings/sections/update', $this->namespace . '\SectionController', 'update'];
        $this->routes[] = ['/clout/settings/sections/{}', $this->namespace . '\SectionController', 'show'];
    }

    public static function viewFolder()
    {
        return __DIR__ . '/Views/';
    }
}
