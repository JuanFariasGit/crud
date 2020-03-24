<?php

namespace App\Model;

class Conexao {
    private static $pdo;

    public static function Con() {
        if(!isset(self::$pdo)) {
            self::$pdo = new \PDO("mysql:host=localhost;dbname=crud;charset=utf8","root","");
        }
        return self::$pdo;
    }
}