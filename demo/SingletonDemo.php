<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Exception;
use RuntimeException;
use DesignPatterns\Creational\Singleton\Singleton;

/**
 * Singleton Pattern Demo
 * 
 * This script demonstrates the Singleton design pattern implementation.
 */

echo "=========================================\n";
echo "      SINGLETON PATTERN DEMONSTRATION    \n";
echo "=========================================\n\n";

// Get the singleton instance
echo "1. Getting first instance:\n";
$singleton1 = Singleton::getInstance();
echo "   " . $singleton1->doSomething() . "\n\n";

// Get another reference to the same instance
echo "2. Getting second instance:\n";
$singleton2 = Singleton::getInstance();
echo "   " . $singleton2->doSomething() . "\n\n";

// Demonstrate they are the same object
echo "3. Comparing instances:\n";
echo "   Are both variables the same instance? ";
echo ($singleton1 === $singleton2) ? "YES ✓\n" : "NO ✗\n";
echo "   Object ID of singleton1: " . spl_object_id($singleton1) . "\n";
echo "   Object ID of singleton2: " . spl_object_id($singleton2) . "\n\n";

// Show message with custom parameter
echo "4. Using method with parameter:\n";
echo "   " . $singleton1->showMessage("Hello from Singleton!") . "\n\n";

// Test error cases (commented out to avoid stopping execution)
echo "5. Testing error prevention (will throw exceptions):\n";

// Test cloning prevention
echo "   Attempting to clone... ";
try {
    $clone = clone $singleton1;
    echo "Unexpected success ✗\n";
} catch (RuntimeException $e) {
    echo "Caught exception: " . $e->getMessage() . " ✓\n";
}

// Test constructor prevention - direct call
echo "   Attempting direct constructor call... ";
try {
    $newInstance = new Singleton();
    echo "Unexpected success ✗\n";
} catch (Error $e) {
    echo "Caught exception: " . $e->getMessage() . " ✓\n";
}

// Test serialization prevention
echo "   Attempting to serialize... ";
try {
    $serialized = serialize($singleton1);
    echo "Unexpected success ✗\n";
} catch (RuntimeException $e) {
    echo "Caught exception: " . $e->getMessage() . " ✓\n";
}

echo "\n=========================================\n";
echo "           DEMONSTRATION COMPLETE       \n";
echo "=========================================\n";