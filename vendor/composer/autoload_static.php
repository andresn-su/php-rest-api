<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4a4cb4eb2fdb6e04b6cf1ce317cef9a4
{
    public static $files = array (
        'cfe4039aa2a78ca88e07dadb7b1c6126' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4a4cb4eb2fdb6e04b6cf1ce317cef9a4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4a4cb4eb2fdb6e04b6cf1ce317cef9a4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
