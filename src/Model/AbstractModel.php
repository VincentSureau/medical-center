<?php

namespace App\Model;

class AbstractModel
{
    protected Database $database;

    public function __construct()
    {
        $this->database = Database::getDatabase();
    }
}