<?php

class Singleton
{
    private static array $instance = [];

    /**
     * @return static::class
     */
    public static function getInstance(): self
    {
        if (empty(self::$instance[static::class])) {
            self::$instance[static::class] = new static();
        }
        return self::$instance[static::class];
    }
}
