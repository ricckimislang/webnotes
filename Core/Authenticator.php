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
            $errpass = password_verify($password, $user['password']);
            // Correct the password verification logic
            if ($user && $errpass) {
                $_SESSION['user'] = [
                    'user_id' => $user['id'],
                    'user_email' => $email
                ];
                flash('success', "Welcome back '{$email}'");
                return true;
            }
            flash('error', 'Invalid email or password');
            return false;
        } catch (PDOException $e) {
            flash('error', 'Login error: ' . $e->getMessage());
            return false;
        }
    }

    public function register($email, $password)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->execute(['email' => $email, 'password' => $password]);

            if ($stmt->rowCount() > 0) {
                flash('success', 'Registration successful! Please login.');
                return true;
            }
            flash('error', 'Registration failed. Please try again.');
            return false;
        } catch (PDOException $e) {
            if (strpos($e->getMessage(), 'Duplicate') !== false) {
                flash('error', 'Email already exists');
            } else {
                flash('error', 'Registration error: ' . $e->getMessage());
            }
            return false;
        }
    }

    public static function isLoggedIn()
    {
        if(isset($_SESSION['user'])) {
            return true;
        }
        return false; // You can also return false directly (no need for curly braces
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        flash('info', 'You have been logged out');
    }
}
