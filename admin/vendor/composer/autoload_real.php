<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit8377f8f5f4c5dfccae00eb4371de4847
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit8377f8f5f4c5dfccae00eb4371de4847', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit8377f8f5f4c5dfccae00eb4371de4847', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit8377f8f5f4c5dfccae00eb4371de4847::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
