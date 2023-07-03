<?php

namespace utils;

class Logger {
    private $logFile;

    public function __construct() {
     
        $logsDir = realpath(__DIR__ . '/../logs'); // Ruta absoluta de la carpeta logs
        $this->logFile = $logsDir . '/logs.txt';

    }
    
    public static function log(string $message) {
        $logger = new Logger();
        $logger->writeLog($message);
    }

    private function writeLog(string $message) {
        date_default_timezone_set('Europe/Madrid');
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[{$timestamp}] {$message}\n";

        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }
    
}



?>