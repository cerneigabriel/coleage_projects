<?php

namespace App\Classes\Core;

abstract class Seeds
{
    protected $seeds = [];

    public function __construct()
    {
    }

    abstract public static function run();
}
