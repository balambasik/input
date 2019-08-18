<?php

namespace Balambasik\Input;

/**
 * Class Input
 * Small and convenient library for working with superglobal or regular arrays.
 * Such as $_GET, $_POST, $_REQUEST, $_COOKIE, $_SESSION, $_SERVER.
 * Supports nested keys: $_POST['foo']['bar']['baz'] ==> Input::post('foo.bar.baz')
 * @author balambasik@gmail.com
 * @package Balambasik\Input
 */
class Input
{
    /**
     * Array key level delimiter
     * @var string
     */
    private static $delimiter = ".";

    /**
     * Get $_POST array value
     * @param $key
     * @param mixed $default
     * @return array|mixed|null
     */
    public static function post($key = null, $default = null)
    {
        return self::arr($_POST, $key, $default);
    }

    /**
     * Get $_GET array value
     * @param $key
     * @param mixed $default
     * @return array|mixed|null
     */
    public static function get($key = null, $default = null)
    {
        return self::arr($_GET, $key, $default);
    }

    /**
     * Get $_REQUEST array value
     * @param $key
     * @param mixed $default
     * @return array|mixed|null
     */
    public static function request($key = null, $default = null)
    {
        return self::arr($_REQUEST, $key, $default);
    }

    /**
     * Get $_COOKIE array value
     * @param $key
     * @param mixed $default
     * @return array|mixed|null
     */
    public static function cookie($key = null, $default = null)
    {
        return self::arr($_COOKIE, $key, $default);
    }

    /**
     * Get $_SESSION array value
     * @param $key
     * @param mixed $default
     * @return array|mixed|null
     */
    public static function session($key = null, $default = null)
    {
        return isset($_SESSION) ? self::arr($_SESSION, $key, $default) : $default;
    }

    /**
     * Get $_SERVER array value
     * @param $key
     * @param mixed $default
     * @return array|mixed|null
     */
    public static function server($key = null, $default = null)
    {
        return self::arr($_SERVER, $key, $default);
    }

    /**
     * Get any Array value
     * @param array $array
     * @param null $key
     * @param mixed $default
     * @return array|mixed|null
     */
    public static function arr(array $array, $key = null, $default = null)
    {
        if ($key === null) {
            return $array;
        }

        if (strripos($key, self::$delimiter) === false) {
            return isset($array[$key]) ? $array[$key] : $default;
        } else {

            $levels = explode(self::$delimiter, $key);

            foreach ($levels as $level) {
                $array = $array[$level];
            }

            return isset($array) ? $array : $default;
        }
    }

    /**
     * Set array key level delimiter
     * @param string $delimiter
     */
    public static function setDelimiter($delimiter = ".")
    {
        self::$delimiter = $delimiter;
    }
}
