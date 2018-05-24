<?php

ini_set('memory_limit', -1);

require 'vendor/autoload.php';

const ROOT_DIR          = __DIR__;
const APP_DIR           = __DIR__ . '/App';
const VIEW_DIR          = __DIR__ . '/App/Views';
const CACHE_DIR         = __DIR__ . '/App/Cache';
const CONFIG_DIR        = __DIR__ . '/App/Configs';

// time caching helper
const MINUTE_IN_SECONDS  = 60;
const HOUR_IN_SECONDS    = 60 * MINUTE_IN_SECONDS;
const DAY_IN_SECONDS     = 24 * HOUR_IN_SECONDS;
const WEEK_IN_SECONDS    = 7 * DAY_IN_SECONDS;
const MONTH_IN_SECONDS   = 30 * DAY_IN_SECONDS;
const YEAR_IN_SECONDS    = 365 * DAY_IN_SECONDS;

date_default_timezone_set('Asia/Kuala_Lumpur');

/**
 * Check route name via server http request
 *
 * @param  string  $route
 * @return boolean
 */
function isRoute($route, $has_route = false)
{
    $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
    $request_route = $request_uri[0];

    if ($has_route) {
        return (strpos($request_route, $route) !== false);
    }

    if ($request_route !== $route) {
        $request_route = preg_replace('{/$}', '', $request_route);
    }

    return ($request_route === $route);
}

/**
 * Parse Current Url
 *
 * @param  string $route
 * @return array
 */
function parseCurrentUrl($route)
{
    $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
    $request_route = preg_replace('{/$}', '', $request_uri[0]);
    $path = explode('/', $request_route);
    return $path;
}

/**
 * Register Routes
 */
switch (true) {

    case isRoute('/'):
        $controller = new App\Controllers\Site();
        $controller->index();
        break;

    case isRoute('/about-sesimple-framework'):

        $controller = new App\Controllers\Site();
        $controller->staticPage('pages/about-us');
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        break;
}
