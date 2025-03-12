<?php
class Database
{
    private static $host = 'localhost:3306';
    private static $username = 'DWES';
    private static $password = 'admin2025';
    private static $dbname = 'instituto';
    private static $conn;

    public static function getConnection()
    {
        try {
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname  , self::$username , self::$password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexion: " . $e->getMessage();
            exit();
        }

        return self::$conn;
    }
}
