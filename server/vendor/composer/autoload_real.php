<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit54e2926dbcb4344f367d843eaff3411e
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

        spl_autoload_register(array('ComposerAutoloaderInit54e2926dbcb4344f367d843eaff3411e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit54e2926dbcb4344f367d843eaff3411e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit54e2926dbcb4344f367d843eaff3411e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
