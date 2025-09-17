<?php

use DesignPatterns\Creational\Builder\WithoutBuilder\Pizza;

require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Demonstration of the problems with object creation without Builder pattern.
 *
 * Shows issues with telescoping constructors, parameter confusion, lack of validation,
 * and poor code readability when creating complex objects.
 */
class WithoutBuilderDemo
{
    /**
     * Run the complete demonstration.
     *
     * @return void
     */
    public function run(): void
    {
        $this->showHeader();
        
        $this->demonstrateConstructorProblems();
        $this->demonstrateReadabilityIssues();
        $this->demonstrateValidationProblems();
        $this->demonstrateOptionalParametersHell();
        $this->demonstrateStepByStepNeed();
        
        $this->showFooter();
    }

    /**
     * Display demonstration header.
     *
     * @return void
     */
    private function showHeader(): void
    {
        echo "========================================\n";
        echo "   PIZZA CREATION PROBLEMS DEMONSTRATION\n";
        echo "   (Without Builder Pattern)\n";
        echo "========================================\n\n";
    }

    /**
     * Demonstrate constructor parameter problems.
     *
     * @return void
     */
    private function demonstrateConstructorProblems(): void
    {
        echo "1. Constructor Parameter Problems:\n";
        echo "=================================\n";

        // Problem 1: Telescoping constructors
        $plainPizza = new Pizza('large');
        echo "Plain pizza: " . $plainPizza->getDescription() . "\n";
        echo "Price: $" . $plainPizza->getPrice() . "\n\n";

        // Problem 2: Parameter ordering confusion
        $confusingPizza = new Pizza(
            'medium',    // size
            true,        // cheese? 
            false,       // pepperoni?
            true,        // bacon?
            false,       // mushrooms?
            true,        // pineapple?
            false,       // jalapenos?
            ['olives']   // extra toppings
        );
        echo "Confusing parameter order: " . $confusingPizza->getDescription() . "\n";
        echo "Price: $" . $confusingPizza->getPrice() . "\n\n";

        // Problem 3: Default parameter hell
        $simplePizza = new Pizza(
            'small',  // size
            false,    // cheese
            true,     // pepperoni
            false,    // bacon
            false,    // mushrooms
            false,    // pineapple
            false,    // jalapenos
            []        // extra toppings
        );
        echo "Simple pizza (verbose): " . $simplePizza->getDescription() . "\n";
        echo "Price: $" . $simplePizza->getPrice() . "\n\n";
    }

    /**
     * Demonstrate readability issues.
     *
     * @return void
     */
    private function demonstrateReadabilityIssues(): void
    {
        echo "2. Readability Issues:\n";
        echo "======================\n";

        // This is completely unreadable!
        $unreadablePizza = new Pizza(
            'large',
            true,
            false,
            true,
            true,
            false,
            true,
            ['onions', 'garlic']
        );

        echo "Unreadable constructor call - what pizza is this?\n";
        echo "Result: " . $unreadablePizza->getDescription() . "\n";
        echo "Price: $" . $unreadablePizza->getPrice() . "\n\n";

        // Maintenance nightmare
        echo "Imagine maintaining this code 6 months later...\n";
        echo "What do all these true/false values mean?\n\n";
    }

    /**
     * Demonstrate validation problems.
     *
     * @return void
     */
    private function demonstrateValidationProblems(): void
    {
        echo "3. Validation Problems:\n";
        echo "=======================\n";

        // Problem: No validation in constructor
        $invalidPizza = new Pizza(
            'huge',  // Invalid size - but no validation!
            true,
            false,
            true,
            false,
            false,
            false,
            []
        );

        echo "Invalid size accepted: " . $invalidPizza->getDescription() . "\n";
        echo "Price with invalid size: $" . $invalidPizza->getPrice() . "\n";

        // Problem: No way to validate combinations
        $weirdPizza = new Pizza(
            'medium',
            false,  // No cheese...
            true,   // but pepperoni?
            false,
            false,
            false,
            false,
            []
        );
        echo "Weird combination: " . $weirdPizza->getDescription() . "\n";
        echo "Price: $" . $weirdPizza->getPrice() . "\n\n";
    }

    /**
     * Demonstrate optional parameters hell.
     *
     * @return void
     */
    private function demonstrateOptionalParametersHell(): void
    {
        echo "4. Optional Parameters Hell:\n";
        echo "============================\n";

        // What if I want to add extra toppings but keep defaults for others?
        $customPizza = new Pizza(
            'medium',
            true,    // cheese
            true,    // pepperoni
            false,   // bacon
            false,   // mushrooms
            false,   // pineapple
            false,   // jalapenos
            ['extra cheese', 'black olives']  // Have to repeat all defaults above!
        );

        echo "Custom pizza (verbose): " . $customPizza->getDescription() . "\n";
        echo "Price: $" . $customPizza->getPrice() . "\n";

        // Constructor signature changes break everything
        echo "This code is fragile - constructor changes break all existing code!\n\n";
    }

    /**
     * Demonstrate the need for step-by-step construction.
     *
     * @return void
     */
    private function demonstrateStepByStepNeed(): void
    {
        echo "5. Need for Step-by-Step Construction:\n";
        echo "======================================\n";

        // Without builder, we might use setters - but this has problems
        $pizza = new Pizza();
        $pizza->size = 'large';
        $pizza->cheese = true;
        $pizza->pepperoni = true;
        // Forgot to set other properties? Now we have a partially constructed object!
        
        echo "Partial construction: " . $pizza->getDescription() . "\n";
        echo "Price: $" . $pizza->getPrice() . "\n";
        echo "Object might be in invalid state!\n\n";
    }

    /**
     * Display demonstration footer.
     *
     * @return void
     */
    private function showFooter(): void
    {
        echo "========================================\n";
        echo "         PROBLEMS DEMONSTRATED\n";
        echo "========================================\n";
        echo "✓ Telescoping constructors\n";
        echo "✓ Parameter ordering confusion\n";
        echo "✓ Default parameter hell\n";
        echo "✓ No validation\n";
        echo "✓ Readability issues\n";
        echo "✓ Fragile code\n";
        echo "✓ Partial object construction\n";
        echo "========================================\n";
    }
}

// Run the demonstration
$demo = new WithoutBuilderDemo();
$demo->run();
    