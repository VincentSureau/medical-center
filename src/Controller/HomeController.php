<?php

namespace App\Controller;

class HomeController
{
    public function booking()
    {
        require dirname(__FILE__, 2) . '/views/booking.php';
    }

    public function list()
    {
        require dirname(__FILE__, 2) . '/views/booking_list.php';
    }
}