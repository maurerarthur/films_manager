<?php

    class ConnectionFactory {

        private static $host = "localhost";
        private static $db = "films_sys";
        private static $db_user = "root";
        private static $db_password = "root";

        public static function getConnection() {
            $conection = "mysql:host=" . self::$host . ";dbname=" . self::$db;
            return new PDO($conection, self::$db_user, self::$db_password);
        }

    }

?>