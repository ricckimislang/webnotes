<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        'guest' => Guestonly::class,
        'auth' => Authonly::class,
    ];
}