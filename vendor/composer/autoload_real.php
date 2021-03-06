<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit6fbe3ba5686e1b1ee571ee031a2c7ec1
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit6fbe3ba5686e1b1ee571ee031a2c7ec1', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit6fbe3ba5686e1b1ee571ee031a2c7ec1', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInit6fbe3ba5686e1b1ee571ee031a2c7ec1::getInitializer($loader)();

        $loader->register(true);

        return $loader;
    }
}
