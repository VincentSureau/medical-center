<?php

namespace App\Model;

use App\Model\AbstractModel;

class BookingModel extends AbstractModel
{
    private int $id;

    private string $lastname;

    private string $firstname;

    private string $email;

    private string $address1;

    private ?string $address2;

    private string $zip;

    private string $city;

    private string $date;

    public function find(int $id)
    {
        $sql = '
            SELECT *
            FROM booking
            WHERE `id` = :id
            ORDER BY date ASC
            LIMIT 1
        ';

        $pdoStatement = $this->database->getPDO()->prepare($sql);
        $pdoStatement->bindParam(':id', $id, \PDO::PARAM_INT);
        $pdoStatement->execute();
        return $pdoStatement->fetchObject(self::class);
    }

    public function findAll()
    {
        $sql = '
            SELECT *
            FROM booking
            ORDER BY date ASC
        ';

        $pdoStatement = $this->database->getPDO()->query($sql);
        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function create()
    {
        $sql = '
            INSERT INTO `booking` (
                `firstname`,
                `lastname`,
                `email`,
                `date`,
                `address1`,
                `address2`,
                `zip`,
                `city`
            ) VALUES (
                :firstname,
                :lastname,
                :email,
                :date,
                :address1,
                :address2,
                :zip,
                :city
            )
        ';

        $pdoStatement = $this->database->getPDO()->prepare($sql);
        $pdoStatement->bindParam(':firstname',$this->firstname);
        $pdoStatement->bindParam(':lastname',$this->lastname);
        $pdoStatement->bindParam(':email',$this->email);
        $pdoStatement->bindParam(':date',$this->date);
        $pdoStatement->bindParam(':address1',$this->address1);
        $pdoStatement->bindParam(':address2',$this->address2);
        $pdoStatement->bindParam(':zip',$this->zip);
        $pdoStatement->bindParam(':city',$this->city);

        $result = $pdoStatement->execute();

        return $result;
    }

    public function update()
    {
        $sql = '
            UPDATE `booking`
            SET
                `firstname` = :firstname,
                `lastname` = :lastname,
                `email` = :email,
                `date` = :date,
                `address1` = :address1,
                `address2` = :address2,
                `zip` = :zip,
                `city` = :city
            WHERE `id` = :id
        ';

        $pdoStatement = $this->database->getPDO()->prepare($sql);
        $pdoStatement->bindParam(':firstname',$this->firstname);
        $pdoStatement->bindParam(':lastname',$this->lastname);
        $pdoStatement->bindParam(':email',$this->email);
        $pdoStatement->bindParam(':date',$this->date);
        $pdoStatement->bindParam(':address1',$this->address1);
        $pdoStatement->bindParam(':address2',$this->address2);
        $pdoStatement->bindParam(':zip',$this->zip);
        $pdoStatement->bindParam(':city',$this->city);
        $pdoStatement->bindParam(':id', $this->id, \PDO::PARAM_INT);

        $result = $pdoStatement->execute();

        return $result;
    }

    public function delete()
    {
        $sql = '
            DELETE
            FROM  `booking`
            WHERE `id` = :id
        ';

        $pdoStatement = $this->database->getPDO()->prepare($sql);
        $pdoStatement->bindParam(':id', $this->id, \PDO::PARAM_INT);

        $result = $pdoStatement->execute();

        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of address1
     */ 
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set the value of address1
     *
     * @return  self
     */ 
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get the value of address2
     */ 
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set the value of address2
     *
     * @return  self
     */ 
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get the value of zip
     */ 
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set the value of zip
     *
     * @return  self
     */ 
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function formatLastname()
    {
        return strtoupper($this->lastname);
    }

    public function formatDate()
    {
        $date = new \DateTime($this->date);
        return $date->format('d/m/y h:i');
    }


    public function formatDateCalendar()
    {
        // '2023-06-09T12:30:00'
        $date = new \DateTime($this->date);
        return $date->format('Y-m-d\Th:i:s');
    }
}