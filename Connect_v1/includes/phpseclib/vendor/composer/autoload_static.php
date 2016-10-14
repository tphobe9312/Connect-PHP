<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3b78ffd0af5b7791f936396d55e87656
{
    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'phpseclib\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'phpseclib\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3b78ffd0af5b7791f936396d55e87656::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3b78ffd0af5b7791f936396d55e87656::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}