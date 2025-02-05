<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit45b6c6f53b44c7ca0d3d34b62eaead0b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpParser\\' => 10,
        ),
        'A' => 
        array (
            'Application\\Shareplay\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
        'Application\\Shareplay\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit45b6c6f53b44c7ca0d3d34b62eaead0b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit45b6c6f53b44c7ca0d3d34b62eaead0b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit45b6c6f53b44c7ca0d3d34b62eaead0b::$classMap;

        }, null, ClassLoader::class);
    }
}
