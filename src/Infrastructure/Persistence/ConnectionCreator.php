<?php

namespace Alura\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection() : PDO 
    {
        $dataBsePath = __DIR__ . '/../../../banco.sqlite';
        return $pdo = new PDO('sqlite:' . $dataBsePath);
    }
}