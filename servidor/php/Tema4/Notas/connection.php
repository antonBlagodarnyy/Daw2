<?php
class Database {
    private static $host = 'localhost:3306';
    private static $username = 'DWES';
    private static $password = 'admin2025';
    private static $dbname = 'notas';
    private static $conn;

    public static function getConnection() {
        self::$conn = new mysqli(self::$host, self::$username, self::$password, self::$dbname);

        if (self::$conn->connect_error) {
            die("Connection failed: " . self::$conn->connect_error);
        }

        return self::$conn;
    }
}
?>
