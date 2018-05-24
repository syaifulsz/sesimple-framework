<?php

namespace App\Components;

class TextHelper
{
    public function slugify($str, $delimiter = '-') {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', $delimiter, $str)));
    }
}
