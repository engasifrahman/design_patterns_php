<?php

namespace DesignPatterns\Creational\Singleton\Trait;

use PDO;
use Throwable;
use PDOException;
use PDOStatement;
use RuntimeException;

/**
 * SQLite Database class using SingletonTrait.
 */
class Database
{
    use SingletonTrait;

    private ?PDO $pdo = null;
    private string $dbFile = 'sqlite.db';
    private bool $isConnected = false;

    /**
     * Initialize database connection and create tables.
     */
    protected function __construct()
    {
        $this->connect();
        $this->createTables();
    }

    /**
     * Establish connection to SQLite database.
     *
     * @return void
     * @throws RuntimeException If connection fails
     */
    private function connect(): void
    {
        try {
            $this->pdo = new PDO("sqlite:{$this->dbFile}");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->isConnected = true;
            
        } catch (PDOException $e) {
            $this->isConnected = false;
            throw new RuntimeException('Database connection failed: ' . $e->getMessage());
        }
    }

    /**
     * Reconnect to the database if disconnected.
     *
     * @return bool True if reconnected successfully, false if already connected
     * @throws RuntimeException If reconnection fails
     */
    public function reconnect(): bool
    {
        if ($this->isConnected) {
            return false; // Already connected
        }

        $this->disconnect(); // Ensure clean state
        $this->connect();
        
        return true;
    }

    /**
     * Check if connected to the database.
     *
     * @return bool
     */
    public function isConnected(): bool
    {
        return $this->isConnected;
    }

    /**
     * Get the PDO instance with connection check.
     *
     * @return PDO
     * @throws RuntimeException If not connected
     */
    private function getConnection(): PDO
    {
        if (!$this->isConnected || $this->pdo === null) {
            throw new RuntimeException('Database is not connected');
        }
        
        return $this->pdo;
    }

    /**
     * Properly disconnect from the database and release resources.
     *
     * @return bool True if disconnected successfully, false if already disconnected
     */
    public function disconnect(): bool
    {
        if (!$this->isConnected) {
            return false;
        }

        try {
            $this->pdo = null;
            $this->isConnected = false;
            $this->performPostDisconnectCleanup();
            
            return true;
            
        } catch (\Throwable $e) {
            error_log('Error during database disconnect: ' . $e->getMessage());
            $this->isConnected = false;
            $this->pdo = null;
            return false;
        }
    }

    /**
     * Perform additional cleanup after disconnection.
     *
     * @return void
     */
    private function performPostDisconnectCleanup(): void
    {
        if (stripos(PHP_OS, 'WIN') === 0) {
            gc_collect_cycles();
            usleep(100000);
        }
    }

    /**
     * Execute a SQL query with parameters.
     *
     * @param string $sql    The SQL query to execute
     * @param array  $params The query parameters
     * @return PDOStatement
     * @throws RuntimeException If not connected or query fails
     */
    public function query(string $sql, array $params = []): PDOStatement
    {
        try {
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute($params);
            return $stmt;
            
        } catch (PDOException $e) {
            throw new RuntimeException('Query failed: ' . $e->getMessage());
        }
    }

    /**
     * Create necessary database tables.
     *
     * @return void
     */
    private function createTables(): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE
        )';

        $this->query($sql);
    }

    /**
     * Insert a new user into the database.
     *
     * @param string $name  The user's name
     * @param string $email The user's email
     * @return int The ID of the inserted user
     */
    public function insertUser(string $name, string $email): int
    {
        $sql = 'INSERT INTO users (name, email) VALUES (?, ?)';
        $this->query($sql, [$name, $email]);

        return (int) $this->pdo->lastInsertId();
    }

    /**
     * Retrieve all users from the database.
     *
     * @return array<array<string, mixed>>
     */
    public function getUsers(): array
    {
        return $this->query('SELECT * FROM users ORDER BY id')->fetchAll();
    }

    /**
     * Get the database file path.
     *
     * @return string
     */
    public function getDbFile(): string
    {
        return $this->dbFile;
    }

    /**
     * Remove the database file.
     *
     * @return bool True if file was deleted successfully, false otherwise
     */
    public function removeDbFile(): bool
    {
        // First, ensure database is properly disconnected
        $this->disconnect();
        
        // Wait a moment for locks to release
        usleep(100000); // 100ms delay

        // Clear the error buffer first
        if (function_exists('error_clear_last')) {
            error_clear_last();
        }

        try {
            if (!file_exists($this->dbFile)) {
                echo "Note: File '{$this->dbFile}' does not exist.\n";
                return true; // Considered successful if file doesn't exist
            }

            if (!is_writable($this->dbFile)) {
                echo "Error: File '{$this->dbFile}' is not writable.\n";
                return false;
            }

            // Suppress warnings and check return value
            $result = @unlink($this->dbFile);
            
            if ($result) {
                echo "File '{$this->dbFile}' has been deleted successfully.\n";
                return true;
            }

            // If unlink failed, check the error
            $error = error_get_last();
            if ($error !== null) {
                echo "Error deleting file '{$this->dbFile}': {$error['message']}\n";
            } else {
                echo "Error: Unable to delete file '{$this->dbFile}' (unknown error).\n";
            }
            
            return false;

        } catch (Throwable $e) {
            // This will catch any actual exceptions (though unlink doesn't throw them)
            echo "Exception while deleting file '{$this->dbFile}': {$e->getMessage()}\n";
            return false;
        }
    }

    /**
     * Destructor to ensure proper cleanup.
     */
    public function __destruct()
    {
        $this->disconnect();
    }
}