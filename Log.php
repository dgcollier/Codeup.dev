<?php

class Log
{
    private $filename;
    private $handle;

    public function __construct($prefix = 'log')
    {
        $this->setFilename($prefix);
        // $this->filename = $prefix . '-' . date('Y-m-d') . '.txt';
        // $this->handle = fopen($this->filename, 'a');
    }

    protected function setFilename($prefix)
    {
        if (is_string($prefix)) {
            $this->filename = $prefix . '-' . date('Y-m-d') . '.txt';
            $this->setHandle($this->filename);
        } else {
            die('Prefix was not a string.' . PHP_EOL);
        }

        if (!is_writable($this->filename) || !touch($this->filename)) {
            die('Insufficient permissions.' . PHP_EOL);
        }
    }

    protected function setHandle($handle)
    {
        $this->handle = fopen($handle, 'a');
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function getHandle()
    {
        return $this->handle;
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

        return print_r("Log recorded." . PHP_EOL);
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