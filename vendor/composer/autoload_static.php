<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd61d2f5b9ebbcbb265a43800a85c64aa
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd61d2f5b9ebbcbb265a43800a85c64aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd61d2f5b9ebbcbb265a43800a85c64aa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd61d2f5b9ebbcbb265a43800a85c64aa::$classMap;

        }, null, ClassLoader::class);
    }
}
