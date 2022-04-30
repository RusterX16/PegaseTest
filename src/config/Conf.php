<?php

class Conf {

    private static string $host = "localhost";
    private static string $dbname = "pegasemarket";
    private static string $user = "root";
    private static string $password = "";

    public static function get($field): string {
        return match ($field) {
            "host" => self::$host,
            "dbname" => self::$dbname,
            "user" => self::$user,
            "password" => self::$password,
            default => throw new InvalidArgumentException("field $field doesn't exists"),
        };
    }

    public static function show_tables(): void {
        require_once "../model/Model.php";

        $query = Model::getPdo() -> query("SHOW TABLES");
        $array = $query -> fetchAll(PDO::FETCH_COLUMN);

        echo "<div class='db_tables'>";
        foreach($array as $key => $value) {
            echo "<div class='db_row'><div class='db_ibox'>$key</div><div class='db_box'>$value</div></div>";
        }
        echo "</div>";
    }
}