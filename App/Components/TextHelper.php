<?php

namespace App\Components;

class TextHelper
{
    /**
     * Slugify Strings
     *
     * Based on Laravel's Helper :: str_slug();
     *
     * @param  string $str
     * @param  string $delimiter
     * @return string
     */
    public function slugify($str, $delimiter = '-') {

        $title = ascii($title);

        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';
        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

        return trim($title, $separator);
    }
}
