<?php

namespace App\Components\Helpers;

use App\Components\View as ViewComponent;

class View
{
    public static function render($template_name, array $params = [], $return_string = false) {
        $view = new ViewComponent;
        return $view->render($template_name, $params, $return_string);
    }
}
