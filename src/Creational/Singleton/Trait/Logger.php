<?php

namespace DesignPatterns\Creational\Singleton\Trait;

use RuntimeException;

/**
 * File Logger class using SingletonTrait.
 */
class Logger
{
    use SingletonTrait;

    private string $logFile = 'app.log';

    /**
     * Initialize logger and ensure log file exists.
     *
     * @throws RuntimeException If log file cannot be created
     */
    protected function __construct()
    {
        $this->ensureLogFileExists();
    }

    /**
     * Ensure the log file exists and is writable.
     *
     * @return void
     * @throws RuntimeException If file cannot be created or is not writable
     */
    private function ensureLogFileExists(): void
    {
        if (!file_exists($this->logFile) && !touch($this->logFile)) {
            throw new RuntimeException('Cannot create log file: ' . $this->logFile);
        }

        if (!is_writable($this->logFile)) {
            throw new RuntimeException('Log file is not writable: ' . $this->logFile);
        }
    }

    /**
     * Write a message to the log file.
     *
     * @param string $message The message to log
     * @param string $level   The log level
     * @return void
     * @throws RuntimeException If writing to log file fails
     */
    public function log(string $message, string $level = 'INFO'): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry  = sprintf('[%s] [%s] %s%s', $timestamp, $level, $message, PHP_EOL);

        $result = file_put_contents($this->logFile, $logEntry, FILE_APPEND | LOCK_EX);

        if ($result === false) {
            throw new RuntimeException('Failed to write to log file: ' . $this->logFile);
        }
    }

    /**
     * Retrieve all log entries.
     *
     * @return array<string>
     */
    public function getLogs(): array
    {
        if (!file_exists($this->logFile)) {
            return [];
        }

        $content = file_get_contents($this->logFile);
        if ($content === false) {
            return [];
        }

        return array_filter(explode(PHP_EOL, $content));
    }

    /**
     * Get the log file path.
     *
     * @return string
     */
    public function getLogFile(): string
    {
        return $this->logFile;
    }

    /**
     * Set a custom log file path.
     *
     * @param string $logFile The path to the log file
     * @return void
     * @throws RuntimeException If the new log file cannot be used
     */
    public function setLogFile(string $logFile): void
    {
        $oldLogFile = $this->logFile;
        $this->logFile = $logFile;

        try {
            $this->ensureLogFileExists();
        } catch (RuntimeException $e) {
            // Revert to old log file if new one is invalid
            $this->logFile = $oldLogFile;
            throw new RuntimeException(
                sprintf('Cannot set log file to %s: %s', $logFile, $e->getMessage())
            );
        }
    }

    /**
     * Remove the log file.
     *
     * @return bool
     */
    public function removeLogFile(): bool
    {
        if (file_exists($this->logFile)) { // Optional: Check if the file exists before attempting to delete
            if (unlink($this->logFile)) {
                echo "File '$this->logFile' has been deleted successfully.";
                return true;
            } else {
                echo "Error: Unable to delete file '$this->logFile'.";
                return false;
            }
        } else {
            echo "Error: File '$this->logFile' does not exist.";
            return false;
        }
    }

    /**
     * Quick log methods for common log levels.
     */

    public function info(string $message): void
    {
        $this->log($message, 'INFO');
    }

    public function warn(string $message): void
    {
        $this->log($message, 'WARN');
    }

    public function error(string $message): void
    {
        $this->log($message, 'ERROR');
    }

    public function debug(string $message): void
    {
        $this->log($message, 'DEBUG');
    }
}