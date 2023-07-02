<?php

namespace database;

class DatabaseConfig { 

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

        return $variablesEnv;

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

        return $variablesEnv;
            
    }
}



?>