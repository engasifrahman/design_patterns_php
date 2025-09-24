<?php

use DesignPatterns\Creational\FactoryMethod\WithoutFactory\LogisticsService;

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Demonstrates the problems with the non-Factory Method approach.
 */
class WithoutFactoryMethodDemo
{
    public function run(): void
    {
        $this->showHeader();
        $this->demonstrateConditionalComplexity();
        $this->demonstrateMaintenanceProblems();
        $this->demonstrateExtensionProblems();
        $this->showFooter();
    }

    private function showHeader(): void
    {
        echo "========================================\n";
        echo "   PROBLEMS WITHOUT FACTORY METHOD\n";
        echo "========================================\n\n";
    }

    private function demonstrateConditionalComplexity(): void
    {
        echo "1. Conditional Complexity Problem:\n";
        echo "==================================\n";

        $logistics = new LogisticsService();

        // The client code is filled with transport type strings
        echo $logistics->deliverGoods('truck', 'New York') . "\n";
        echo $logistics->deliverGoods('ship', 'Shanghai') . "\n";

        echo "\n🔴 PROBLEM: Magic strings everywhere!\n";
        echo "🔴 PROBLEM: What if I typo 'truck' as 'truk'?\n";
    }

    private function demonstrateMaintenanceProblems(): void
    {
        echo "2. Maintenance Problems:\n";
        echo "========================\n";

        $logistics = new LogisticsService();

        // Adding a new transport type requires modifying multiple methods
        echo "Current transport types: truck, ship, plane\n";
        echo "To add 'train' transport, I need to modify:\n";

        echo "🔴 PROBLEM: Violates Open/Closed Principle\n";
        echo "🔴 PROBLEM: High risk of introducing bugs\n";
        echo "🔴 PROBLEM: Testing becomes more complex\n\n";
    }

    private function demonstrateExtensionProblems(): void
    {
        echo "3. Extension Problems:\n";
        echo "======================\n";

        // What if we want specialized logistics?
        echo "Cannot create specialized logistics without code duplication:\n";
        
        echo "❌ Cannot have 'ExpressLogistics' with different time calculations\n";
        echo "❌ Cannot have 'EcoLogistics' with different cost calculations\n";
        echo "❌ Cannot have 'RegionalLogistics' with regional-specific rules\n\n";

        echo "🔴 PROBLEM: No polymorphism - everything is conditional\n";
        echo "🔴 PROBLEM: Hard to create variations of logistics behavior\n";
        echo "🔴 PROBLEM: Business logic is scattered and duplicated\n";
    }

    private function showFooter(): void
    {
        echo "\n========================================\n";
        echo "           SUMMARY OF PROBLEMS\n";
        echo "========================================\n";
        echo "✅ Conditional complexity throughout codebase\n";
        echo "✅ Violates Open/Closed Principle\n";
        echo "✅ Magic strings and no type safety\n";
        echo "✅ Code duplication in similar methods\n";
        echo "✅ Hard to test individual components\n";
        echo "✅ Difficult to extend with new functionality\n";
        echo "✅ Business logic scattered across methods\n";
        echo "========================================\n";
    }
}

// Run the demonstration
$demo = new WithoutFactoryMethodDemo();
$demo->run();