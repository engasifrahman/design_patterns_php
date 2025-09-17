<?php

namespace DesignPatterns\Creational\Singleton\Inheritance;

use RuntimeException;

/**
 * Simple File Logger singleton using SingletonRegistry.
 *
 * Provides basic logging functionality to a file with various log levels.
 * Ensures thread-safe file operations and proper error handling.
 */
class Logger extends SingletonRegistry
{
    /** @var string Default log file name */
    private string $logFile = 'app.log';

    /**
     * Initialize logger and ensure log file exists.
     *
     * @throws RuntimeException If log file cannot be created or is not writable
     */
    protected function __construct()
    {
        parent::__construct();
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
            throw new RuntimeException(
                sprintf('Cannot create log file: %s', $this->logFile)
            );
        }

        if (!is_writable($this->logFile)) {
            throw new RuntimeException(
                sprintf('Log file is not writable: %s', $this->logFile)
            );
        }
    }

    /**
     * Write a message to the log file with specified log level.
     *
     * @param string $message The message to log
     * @param string $level   The log level (e.g., INFO, WARN, ERROR, DEBUG)
     * @return void
     * @throws RuntimeException If writing to log file fails
     */
    public function log(string $message, string $level = 'INFO'): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry  = sprintf('[%s] [%s] %s%s', $timestamp, $level, $message, PHP_EOL);

        $result = file_put_contents($this->logFile, $logEntry, FILE_APPEND | LOCK_EX);

        if ($result === false) {
            throw new RuntimeException(
                sprintf('Failed to write to log file: %s', $this->logFile)
            );
        }
    }

    /**
     * Retrieve all log entries from the log file.
     *
     * @return array<string> Array of log entries, empty array if no logs or file doesn't exist
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

        $lines = explode(PHP_EOL, $content);

        return array_filter($lines, static function (string $line): bool {
            return trim($line) !== '';
        });
    }

    /**
     * Get the path to the log file.
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

    /**
     * Log an informational message.
     *
     * @param string $message The informational message
     * @return void
     */
    public function info(string $message): void
    {
        $this->log($message, 'INFO');
    }

    /**
     * Log a warning message.
     *
     * @param string $message The warning message
     * @return void
     */
    public function warn(string $message): void
    {
        $this->log($message, 'WARN');
    }

    /**
     * Log an error message.
     *
     * @param string $message The error message
     * @return void
     */
    public function error(string $message): void
    {
        $this->log($message, 'ERROR');
    }

    /**
     * Log a debug message.
     *
     * @param string $message The debug message
     * @return void
     */
    public function debug(string $message): void
    {
        $this->log($message, 'DEBUG');
    }
}