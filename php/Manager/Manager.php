<?php

namespace php\Manager;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;game=test;charset=utf8', 'root', 'smileroot');
        return $db;
    }
}