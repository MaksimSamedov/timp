<?php

namespace App\Utils;

class Debug
{
    public static function _print($data = null): String
    {
        ob_start();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        return ob_get_clean();
    }

    public static function print($data = null): Void
    {
        echo self::_print($data);
    }

    public static function _dump($data = null): String
    {
        ob_start();
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        return ob_get_clean();
    }

    public static function dump($data = null): Void
    {
        echo self::_dump($data);
    }
}