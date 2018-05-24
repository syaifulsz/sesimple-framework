<?php

namespace App\Controllers;

use App\Components\Cache;
use App\Components\View;
use App\Components\Config;

class Controller
{
    protected $view;
    protected $cache;
    protected $config;

    public function __construct()
    {
        $this->view = new View();
        $this->cache = new Cache();
        $this->config = Config::getAll();
    }
}
