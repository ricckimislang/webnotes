<?php
namespace Core\Middleware;

class Authonly
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header('location: /login');
            exit();
        }
    }
}