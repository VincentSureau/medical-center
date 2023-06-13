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
        $config = parse_ini_file(dirname(__FILE__, 3). '/config.ini');
        $db_dbname = $config['DB_NAME'];
        $db_host = $config['DB_HOST'];
        $db_port = $config['DB_PORT'];
        $db_user = $config['DB_USER'];
        $db_pass = $config['DB_PASSWORD'];
        try {
            $dbh = new \PDO("mysql:host=$db_host;port=$db_port;dbname=$db_dbname", $db_user, $db_pass,array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            ));
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        require dirname(__FILE__, 2) . '/views/booking_list.php';
    }
}