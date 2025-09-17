<?php

namespace DesignPatterns\Creational\Singleton\Trait;

use RuntimeException;

/**
 * Singleton functionality implemented as a trait.
 * Can be used by any class that needs singleton behavior.
 */
trait SingletonTrait
{
    /** @var array<string, static> Registry of singleton instances */
    private static array $instances = [];

    /**
     * Protected constructor to prevent direct instantiation.
     * Classes using this trait should implement their own constructor.
     */
    protected function __construct()
    {
        // Initialization logic in using classes
    }

    /**
     * Get the singleton instance for the called class.
     *
     * @return static
     */
    public static function getInstance(): static
    {
        $class = static::class;

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }

    /**
     * Prevent cloning of the singleton instance.
     *
     * @return void
     * @throws RuntimeException When attempting to clone
     */
    public function __clone(): void
    {
        throw new RuntimeException('Cannot clone a singleton instance');
    }

    /**
     * Prevent unserialization of the singleton instance.
     *
     * @return void
     * @throws RuntimeException When attempting to unserialize
     */
    public function __wakeup(): void
    {
        throw new RuntimeException('Cannot unserialize a singleton instance');
    }

    /**
     * Clear all singleton instances (mainly for testing).
     *
     * @return void
     */
    public static function clearInstances(): void
    {
        self::$instances = [];
    }

    /**
     * Get all registered singleton instances.
     *
     * @return array<string, static>
     */
    public static function getInstances(): array
    {
        return self::$instances;
    }

    /**
     * Check if an instance exists for the given class.
     *
     * @param string $className
     * @return bool
     */
    public static function hasInstance(string $className): bool
    {
        return isset(self::$instances[$className]);
    }
}