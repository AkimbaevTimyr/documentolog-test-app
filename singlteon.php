<?php


class Singleton {
    private static $instance = null;

    protected function __construct(){}

    protected function __clone(){}

    public static function getInstance()
    {
        if(!isset(self::$instance))
        {
            self::$instance = new static();
        }
        return self::$instance;
    }
}

$singleton = Singleton::getInstance();
$singleton2 = Singleton::getInstance();

if($singleton === $singleton2) {
    echo "Singleton работает";
} else {
    echo "Singleton не работает";
}