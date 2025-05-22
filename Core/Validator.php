<?php

namespace Core;

use PDO;
use PDOException;

class Validator
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public static function string($value, $fieldName, $min = 1, $max = 500)
    {
        $value = trim($value);
        $length = strlen($value);

        if ($length < $min) {
            return false;
        }

        if ($length > $max) {
            return false;
        }

        return $value;
    }

    public static function password($value, $fieldName = 'password', $min = 8, $max = 20)
    {
        if (strlen($value) < $min) {
            throw new \Exception("The $fieldName must be at least $min characters.");
        }

        if (strlen($value) > $max) {
            throw new \Exception("The $fieldName must be less than $max characters.");
        }

        return $value;
    }

    public function checkUser(string $email): bool
    {
        try {
            if ($email) {
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);

                if (!$email) {
                    throw new \Exception("Invalid email format");
                }

                $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM users WHERE email = :email");
                $stmt->execute(['email' => $email]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                
                return $result['count'] > 0; // Returns true if email exists, false if it doesn't
            }
            return false;
        } catch (PDOException $e) {
            throw new \Exception("Database error: " . $e->getMessage());
        }
    }
}
