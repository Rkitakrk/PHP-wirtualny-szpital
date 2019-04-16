<?php

namespace Component;

class Container
{
    private static $storage = [];

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public static function add($key, $value)
    {
        self::$storage[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed
     * @throws \Exception
     */
    public static function get($key)
    {
        if (array_key_exists($key, self::$storage)) {
            return self::$storage[$key];
        } else {
            throw new \Exception('This value is not set in storage');
        }
    }
}