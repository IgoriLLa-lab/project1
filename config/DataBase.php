<?php

class DataBase
{

    private string $DB_HOST = 'localhost';
    private string $USER_NAME = 'root';
    private string $PASSWORD = 'root';
    private string $DB_NAME = 'php_db';
    public $conn;

    //получение соединения с базой данных
    public function getConnect()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->DB_HOST . ";dbname=" . $this->DB_NAME, $this->USER_NAME, $this->PASSWORD);
        } catch (PDOException $e) {
            echo "Невозможно соедениться с базой данных" . $e->getMessage();
        }
        return $this->conn;
    }

}