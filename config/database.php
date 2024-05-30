<?php
namespace Config;

use PDO;
use PDOException;

if (!class_exists('Config\Database')) {
    class Database {
        private static $instance = null;

        public static function getInstance() {
            if (self::$instance == null) {
                $host = '188.166.24.55';
                $db = 'hamilton-9-so&sam';
                $user = 'hamilton-9-so&sam';
                $pass = 'n5g6ijcUQRMDEeDv';

                try {
                    self::$instance = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                }
            }
            return self::$instance;
        }
    }
}
?>
