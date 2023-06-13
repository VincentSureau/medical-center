<?php

namespace App\Model;

class Database
{
    private \PDO $pdo;

    private $db_dbname;
    private $db_host;
    private $db_port;
    private $db_password;
    private $db_user;

    public static $_instance;

    public function __construct()
    {
        $this->getConfig();
        try {
            $this->pdo = new \PDO("mysql:host=$this->db_host;port=$this->db_port;dbname=$this->db_dbname", $this->db_user, $this->db_password,array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            ));
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    private function getConfig()
    {
        $config = parse_ini_file(dirname(__FILE__, 3). '/config.ini');
        $this->db_dbname = $config['DB_NAME'];
        $this->db_host = $config['DB_HOST'];
        $this->db_port = $config['DB_PORT'];
        $this->db_user = $config['DB_USER'];
        $this->db_password = $config['DB_PASSWORD'];
    }

    /**
     * Get the database instance
     */ 
    public static function getDatabase()
    {
        if(self::$_instance == null) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    /**
     * Get the value of pdo
     */ 
    public function getPdo()
    {
        return $this->pdo;
    }
}