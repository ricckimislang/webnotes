<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    protected $host = 'localhost';
    protected $db_name = 'web-note';
    protected $username = 'root';
    protected $password = '';
    protected $conn;

    public function connect(): PDO
    {
        if ($this->conn !== null) {
            return $this->conn;
        }

        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
            return $this->conn;
        } catch(PDOException $e) {
            throw new PDOException('Connection Error: ' . $e->getMessage());
        }
    }
}