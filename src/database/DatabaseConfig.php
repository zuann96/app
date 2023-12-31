<?php

namespace database;

use mysqli;

class DatabaseConfig { 

    private static $conn_reader = null;
    private static $conn_updater = null;



    /**
     * Connexión SOLO LECTURA
     *
     * @return void
     * 
     */
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

        if(self::$conn_reader == null || self::$conn_reader->connect_errno)self::$conn_reader = new mysqli($variablesEnv["dbname"], $variablesEnv["username"], $variablesEnv["passwd"]);

        return self::$conn_reader;

    }
    
    /**
     * Connexión solo escritura, actualización
     *
     * @return void
     * 
     */
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

        if(self::$conn_updater == null ||self::$conn_updater->connect_errno)self::$conn_updater = new mysqli($variablesEnv["dbname"], $variablesEnv["username"], $variablesEnv["passwd"]);

        return self::$conn_updater;
            
    }

    public static function establishDatabaseConnection():bool{
        return boolval(!self::getResourcesReader()->connect_errno);
    }



}




?>