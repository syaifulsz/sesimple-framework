<?php

ini_set('memory_limit', -1);
date_default_timezone_set('Asia/Kuala_Lumpur');

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/contants.php';

use App\Routes\Web as WebRoute;

class App
{
    public function __construct()
    {
        new WebRoute;
    }
}

new App;
