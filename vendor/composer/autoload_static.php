<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit14b632d4a93a97eb2ce9df91ba6c0233
{
    public static $files = array (
        '8cf085ff060c1fd131c06283fd5dec4d' => __DIR__ . '/../..' . '/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Core\\' => 5,
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Core\\Authenticator' => __DIR__ . '/../..' . '/Core/Authenticator.php',
        'Core\\Database' => __DIR__ . '/../..' . '/Core/Database.php',
        'Core\\Router' => __DIR__ . '/../..' . '/Core/Router.php',
        'Core\\Validator' => __DIR__ . '/../..' . '/Core/Validator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit14b632d4a93a97eb2ce9df91ba6c0233::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit14b632d4a93a97eb2ce9df91ba6c0233::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit14b632d4a93a97eb2ce9df91ba6c0233::$classMap;

        }, null, ClassLoader::class);
    }
}
