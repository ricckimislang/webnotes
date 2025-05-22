<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => Guestonly::class,
        'auth' => Authonly::class,
    ];

    public static function resolve($key)
    {

        if(!$key)
        {
            return;
        }
        $middleware = static::MAP[$key] ?? null;

        if (!$middleware) {
            throw new \Exception("No middleware defined: {$key}");
        }

        (new $middleware)->handle();
    }
}