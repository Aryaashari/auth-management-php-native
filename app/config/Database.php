<?php
namespace Login\Management\Config;

require_once __DIR__."./../../config/database.php";


class Database {

    private static ?\PDO $db = null;

    public static function getConnection(string $env = "test") : \PDO {

        if (is_null(self::$db)) {
            $url = getDatabaseConfig()["mysql"][$env]["url"];
            $username = getDatabaseConfig()["mysql"][$env]["username"];
            $password = getDatabaseConfig()["mysql"][$env]["password"];
            self::$db = new \PDO($url,$username,$password);
        }

        return self::$db;

    }

}