<?php

namespace App\Controller;

use App\Model\BookingModel;

class HomeController
{
    public function booking()
    {
        $errors = [];
        // if form has been submitted
        if(count($_POST) > 0) {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            if(!$email) {
                $errors['email'] = "Merci d'indiquer une adresse mail valide";
            }

            $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
            if(strlen($firstname) < 1) {
                $errors['firstname'] = "Merci d'indiquer un prénom valide";
            }

            $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
            if(strlen($lastname) < 1) {
                $errors['lastname'] = "Merci d'indiquer un nom valide";
            }

            $address1 = trim(filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_SPECIAL_CHARS));
            if(strlen($address1) < 1) {
                $errors['address1'] = "Merci d'indiquer une addresse valide";
            }

            $address2 = trim(filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_SPECIAL_CHARS));

            $zip = trim(filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_REGEXP, [
                'options' => ['regexp' => '/^\d{5}$/']
            ]));

            if(!$zip) {
                $errors['zip'] = "Merci d'indiquer un code postal valide";
            }

            $date = filter_input(INPUT_POST, 'date', FILTER_CALLBACK, [
                'options' => [$this, 'validate_date']
            ]);
            if(!$date) {
                $errors['date'] = "Merci de choisir une date valide";
            }

            $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS));
            if(strlen($city) < 1) {
                $errors['city'] = "Merci d'indiquer une ville valide";
            }


            if(empty($errors)) {
                $bookingModel = new BookingModel();
                $bookingModel
                    ->setFirstname($firstname)
                    ->setLastname($lastname)
                    ->setEmail($email)
                    ->setAddress1($address1)
                    ->setAddress2($address2)
                    ->setZip($zip)
                    ->setCity($city)
                    ->setDate($date->format('Y-m-d h:i:s'))
                ;
                $result = $bookingModel->create();
                if($result) {
                    header('Location: ?page=list');
                    exit();
                } else {
                    $error['booking'] = 'Une erreur est survenue';
                }
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

    private function validate_date($date)
    {
        if(empty($date)) {
            return false;
        }

        try {
            $date = new \DateTime($date);
            return $date;
        } catch (\Throwable $th) {
            return false;
        }
    }
}