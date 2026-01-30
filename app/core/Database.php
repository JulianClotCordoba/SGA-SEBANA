<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        // Load main config to get environment setting
        $config = require dirname(__DIR__) . '/config/config.php';
        $environment = $config['db_environment'] ?? 'local';

        // Load environment-specific database config
        $dbConfigFile = dirname(__DIR__) . "/config/database.{$environment}.php";

        if (!file_exists($dbConfigFile)) {
            die("Database config file not found: database.{$environment}.php");
        }

        $dbConfig = require $dbConfigFile;

        try {
            $dsn = "mysql:host={$dbConfig['host']};port={$dbConfig['port']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}";

            // Force secure PDO options
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false, // Force real prepared statements
            ];

            $this->pdo = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], $options);
        } catch (PDOException $e) {
            if ($config['debug'] ?? false) {
                die("Database Connection Failed: " . $e->getMessage());
            } else {
                die("Database Connection Failed. Please contact administrator.");
            }
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    /**
     * Get current environment name
     */
    public static function getEnvironment(): string
    {
        $config = require dirname(__DIR__) . '/config/config.php';
        return $config['db_environment'] ?? 'local';
    }
}
