<?php

use App\Controller\ErrorController;

require_once 'vendor/autoload.php';

$page = $_GET['page'] ?? 'booking';

$authorized_pages = [
    'booking' => [
        'controller' => 'HomeController',
        'method' => 'booking'
    ],
    'list' => [
        'controller' => 'HomeController',
        'method' => 'list'
    ],
    'booking_edit' => [
        'controller' => 'BookingController',
        'method' => 'edit'
    ]
];

if(array_key_exists($page, $authorized_pages)) {
    // je récupère le nom du conroller à instancier
    $controller_name = "App\\Controller\\" . $authorized_pages[$page]['controller'];
    // je récupère la méthode du controller à appeller
    $method_name = $authorized_pages[$page]['method'];
    // j'instancie mon controller
    $controller = new $controller_name();
    // j'appelle la méthode demandée
    $controller->$method_name();
} else {
    $controller = new ErrorController();
    $controller->error404();
}