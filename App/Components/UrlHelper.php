<?php

namespace App\Components;

use App\Components\Config;

class UrlHelper
{
    public function base_url($url = null) {
        $base_url = Config::get('app')['base_url'];
        if ($url) {
            $url = ltrim($url, '/');
        }
        return $base_url . ($url ? "/{$url}" : '');
    }
}
