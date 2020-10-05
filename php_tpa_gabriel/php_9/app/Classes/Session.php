<?php
class Session
{
    public function __construct()
    {
        session_start();
    }

    public static function start()
    {
        return new self();
    }

    public static function get()
    {
        return $_SESSION;
    }

    public static function setItem($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function getItem($name)
    {
        if (isset($_SESSION[$name])) return $_SESSION[$name];

        return false;
    }

    public static function removeItem($name, $key = null)
    {
        if (isset($_SESSION[$name])) {
            if (!is_null($key) && $key >= 0) {
                unset($_SESSION[$name][$key]);
                return true;
            }

            unset($_SESSION[$name]);
        }

        return false;
    }

    public static function reset()
    {
        session_unset();
    }
}
