<?php

namespace App\Controller;

use App\Model\BookingModel;

class HomeController
{
    public function booking()
    {
        require dirname(__FILE__, 2) . '/views/booking.php';
    }

    public function list()
    {
        $bookingModel = new BookingModel();
        $result = $bookingModel->findAll();

        require dirname(__FILE__, 2) . '/views/booking_list.php';
    }
}