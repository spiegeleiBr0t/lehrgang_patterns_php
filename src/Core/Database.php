<?php

namespace Taskflow\Core;

use Taskflow\Core\Configloader;

use PDO;

class Database
{
    private static ?Database $instance = null;
    private PDO $connection;

    private Configloader $configLoader;

    private function __construct() {


        $this->configLoader = Configloader::getConfInstance();
        $data = $this->configLoader->getData();

        $host = $data['host'];
        $db   = $data['db'];
        $user = $data['user'];
        $pass = $data['pass'];
        $charset = $data['charset'];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->connection = new PDO($dsn, $user, $pass, $options);
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}