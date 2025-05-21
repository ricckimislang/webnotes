<?php

namespace Core;

use PDO;
use PDOException;

class Authenticator
{
    private $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    
    public function login(string $email, string $password)
    {
        try {
            $stmt = $this->db->prepare('SELECT id, password FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                return true;
            }
            
            return false;
        } catch (PDOException $e) {
            // Log error in production
            error_log('Login error: ' . $e->getMessage());
            return false;
        }
    }
    
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
    
    public function logout()
    {
        unset($_SESSION['user_id']);
        session_destroy();
    }
}