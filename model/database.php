<?php

/* 
 * Date       User          Description
 * -----  ------------ ------------------------------------
 * 2/11/2022  Kyle Jones    INITIAL creation of database.php
 *  */

class Database {
    private static $dsn = 'mysql:host=localhost;dbname=wldesign';
    private static $username = 'kj_jones28';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                         self::$username,
                         self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
 
?>