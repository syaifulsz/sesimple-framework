<?php

namespace App\Controllers;

// components
use App\Components\UrlHelper;
use App\Components\TextHelper;

class Site extends Controller
{
    public function index()
    {
        $messages = [
            'Hello and thank you for using <a href="https://github.com/syaifulsz/sesimple-framework">Sesimple Framework</a>.',
            '<i>Sesimple yang boleh.</i>',
            'See example of static page <a href="/about-sesimple-framework">About Sesimple Framework</a>'
        ];

        echo $this->view->render('home', [
            'messages' => $messages
        ], true);
    }

    public function staticPage($page)
    {
        return $this->view->render($page);
    }
}
