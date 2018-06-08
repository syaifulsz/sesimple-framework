<?php

namespace App\Routes;

use App\Controllers\Site as SiteController;

class Web
{
    public function __construct()
    {
        /**
         * Register Routes
         */
        switch (true) {

            case $this->isRoute('/'):
                $controller = new SiteController();
                $controller->index();
                break;

            case $this->isRoute('/about-sesimple-framework'):
                $controller = new SiteController();
                $controller->staticPage('pages/about-us');
                break;

            default:
                header('HTTP/1.0 404 Not Found');
                break;
        }
    }

    /**
     * Check route name via server http request
     *
     * @param  string  $route
     * @return boolean
     */
    protected function isRoute($route, $has_route = false)
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
    protected function parseCurrentUrl($route)
    {
        $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
        $request_route = preg_replace('{/$}', '', $request_uri[0]);
        $path = explode('/', $request_route);
        return $path;
    }
}
