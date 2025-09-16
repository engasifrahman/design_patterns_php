<?php

namespace DesignPatterns\Creational\Singleton;

/**
 * Singleton class implementation.
 *
 * This class ensures that only one instance of itself is created and provides
 * a global access point to that instance.
 */
final class Singleton
{
    /**
     * The single instance of the class.
     */
    private static ?self $instance = null;

    /**
     * Private constructor to prevent direct object creation.
     *
     * This prevents instantiation from outside the class and also prevents
     * inheritance since the class is marked as final.
     */
    private function __construct()
    {
        // Initialization code can be placed here
        echo "Singleton instance created!\n";
    }

    /**
     * Get the singleton instance of the class.
     *
     * @return Singleton The singleton instance
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Prevent cloning of the singleton instance.
     *
     * @throws \RuntimeException When attempting to clone the singleton
     */
    public function __clone(): void
    {
        throw new \RuntimeException('Cannot clone a singleton instance.');
    }

    /**
     * Prevent serialization of the singleton instance.
     *
     * @throws \RuntimeException When attempting to serialize the singleton
     */
    public function __serialize(): array
    {
        throw new \RuntimeException('Cannot serialize a singleton instance.');
    }

    /**
     * Prevent deserialization of the singleton instance.
     *
     * @throws \RuntimeException When attempting to deserialize the singleton
     */
    public function __unserialize(array $data): void
    {
        throw new \RuntimeException('Cannot deserialize a singleton instance.');
    }

    /**
     * Example method to demonstrate singleton functionality.
     *
     * @return string A sample message
     */
    public function doSomething(): string
    {
        return 'Singleton is working! Instance ID: ' . spl_object_id($this);
    }

    /**
     * Another example method with parameter.
     *
     * @param string $message Custom message
     * @return string Formatted response
     */
    public function showMessage(string $message): string
    {
        return "Singleton says: " . $message . " (Instance ID: " . spl_object_id($this) . ")";
    }
}