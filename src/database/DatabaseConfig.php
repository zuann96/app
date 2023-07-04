<?php

namespace database;

use mysqli;

class DatabaseConfig { 

    private static $conn_reader = null;
    private static $conn_updater = null;

    public static function getResourcesReader() {
        $host = getenv("MYSQL_HOST");
        $username = getenv("READER_USER");
        $passwd = getenv("READER_PASSWORD");
        $dbname = getenv("MYSQL_DATABASE");
    
        $variablesEnv = [
            'host' => $host,
            'username' => $username,
            'passwd' => $passwd,
            'dbname' => $dbname
        ];

        if(self::$conn_reader == null)self::$conn_reader = new mysqli($variablesEnv["dbname"], $variablesEnv["username"], $variablesEnv["passwd"]);

        return self::$conn_reader;

    }
    
    public static function getResourcesUpdater() {
    
        $host = getenv("MYSQL_HOST");
        $username = getenv("UPDATER_USER");
        $passwd = getenv("UPDATER_PASSWORD");
        $dbname = getenv("MYSQL_DATABASE");
    
        $variablesEnv = [
            'host' => $host,
            'username' => $username,
            'passwd' => $passwd,
            'dbname' => $dbname
        ];

        if(self::$conn_updater == null)self::$conn_updater = new mysqli($variablesEnv["dbname"], $variablesEnv["username"], $variablesEnv["passwd"]);

        return self::$conn_updater;
            
    }
}



?>