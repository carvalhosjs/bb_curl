<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7d3dc10930f0cac066a36f9dc4b2990e
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7d3dc10930f0cac066a36f9dc4b2990e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7d3dc10930f0cac066a36f9dc4b2990e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
