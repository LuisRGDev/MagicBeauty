<?php

class Database {
    private $db_file = __DIR__ . '/../database/database.sqlite';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $connection = getenv('DB_CONNECTION') ?: 'sqlite';

            if ($connection === 'mysql') {
                $host = getenv('DB_HOST') ?: '127.0.0.1';
                $port = getenv('DB_PORT') ?: '3306';
                $db   = getenv('DB_DATABASE') ?: 'magicbeauty';
                $user = getenv('DB_USERNAME') ?: 'root';
                $pass = getenv('DB_PASSWORD') ?: '';

                $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
                $this->conn = new PDO($dsn, $user, $pass);
            } else {
                // SQLite default
                // Ensure database directory exists
                $dir = dirname($this->db_file);
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }

                // Create file if it doesn't exist
                if (!file_exists($this->db_file)) {
                    touch($this->db_file);
                }

                $this->conn = new PDO("sqlite:" . $this->db_file);
            }
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
