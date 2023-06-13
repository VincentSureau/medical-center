<?php

namespace App\Controller;

use App\Model\BookingModel;

class HomeController
{
    public function booking()
    {
        dump($_POST);
        $errors = [];
        // if form has been submitted
        if(count($_POST) > 0) {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if(!$email) {
                $errors['email'] = "Merci d'indiquer une adresse mail valide";
            }

        }

        require dirname(__FILE__, 2) . '/views/booking.php';
    }

    public function list()
    {
        $bookingModel = new BookingModel();
        $result = $bookingModel->findAll();

        require dirname(__FILE__, 2) . '/views/booking_list.php';
    }
}