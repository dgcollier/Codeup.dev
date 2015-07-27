<?php

class Log
{
    public $filename;
    public $handle;

    public function __construct($prefix = 'log')
    {
        $this->filename = $prefix . '-' . date('Y-m-d') . '.txt';
        $this->handle = fopen($this->filename, 'a');
    }

    public function __destruct()
    {
        fclose($this->handle);
    }

    public function logMessage($logLevel, $message)
    {
        $logLevel = strtoupper($logLevel);
        $message = strtoupper($message);
        fwrite($this->handle, date('Y-m-d') . ' ' . date('H:i:s') . " [{$logLevel}] $message" . PHP_EOL);

        return print_r("Login attempt recorded." . PHP_EOL);
    }

    public function logInfo($message)
    {
        $this->logMessage("INFO", $message);   
    }

    public function logError($message) 
    {
        $this->logMessage("ERROR", $message);
    }
}