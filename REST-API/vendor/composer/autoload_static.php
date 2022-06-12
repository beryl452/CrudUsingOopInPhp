<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4889693b1c8a548aa88a5128af56337f
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Exception\\' => 10,
        ),
        'C' => 
        array (
            'Configuration\\' => 14,
            'Class\\' => 6,
        ),
        'A' => 
        array (
            'Api\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Exception\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Exception',
        ),
        'Configuration\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Configuration',
        ),
        'Class\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Class',
        ),
        'Api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Api',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4889693b1c8a548aa88a5128af56337f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4889693b1c8a548aa88a5128af56337f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4889693b1c8a548aa88a5128af56337f::$classMap;

        }, null, ClassLoader::class);
    }
}
