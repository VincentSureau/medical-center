<?php

namespace App\Controller;

class ErrorController
{
    public function error404()
    {
        require dirname(__FILE__, 2) . '/views/errors/404.php';
    }
}