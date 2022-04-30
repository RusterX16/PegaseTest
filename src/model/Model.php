<?php

require_once "../lib/File.php";
require_once File::build_path(["config", "Conf.php"]);

class Model {

    private static $pdo;

    private static function connect(): void {

        $host = Conf::get("host");
        $dbname = Conf::get("dbname");
        $user = Conf::get("user");
        $password = Conf::get("password");

        try {
            self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        } catch(PDOException $e) {
            die($e -> getMessage());
        }
    }

    public static function getPdo(): PDO {
        if(is_null(self::$pdo)) {
            self::connect();
        }
        return self::$pdo;
    }
}