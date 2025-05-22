<?php

namespace Core\Middleware;

class Guestonly
{
    public function handle()
    {
        if (isset($_SESSION['user'])) {
            header('location: /');
            exit();
        }
    }
}
