<?php
use Pimple\Container;

class SessionStorage
{
    /**
     * Instantiate SessionStorage
     *
     * @param string $cookieName
     */
    function __contstruct($cookieName = 'PHPSESSID')
    {
        session_name($cookieName);
        session_start();
    }

    /**
     * Setter for Session
     *
     * @param $key
     * @param $value
     */
    function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Getter session cookie value
     *
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    function get($key)
    {
        return $_SESSION[$key];
    }
}