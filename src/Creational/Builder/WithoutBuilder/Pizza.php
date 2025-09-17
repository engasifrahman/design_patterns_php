<?php

namespace DesignPatterns\Creational\Builder\WithoutBuilder;

/**
 * Pizza class demonstrating problems with complex object creation without Builder pattern.
 *
 * Shows issues with telescoping constructors, parameter confusion, and lack of validation.
 */
class Pizza
{
    /** @var string Pizza size */
    public string $size;
    
    /** @var bool Whether pizza has cheese */
    public bool $cheese;
    
    /** @var bool Whether pizza has pepperoni */
    public bool $pepperoni;
    
    /** @var bool Whether pizza has bacon */
    public bool $bacon;
    
    /** @var bool Whether pizza has mushrooms */
    public bool $mushrooms;
    
    /** @var bool Whether pizza has pineapple */
    public bool $pineapple;
    
    /** @var bool Whether pizza has jalapenos */
    public bool $jalapenos;
    
    /** @var array<string> Extra toppings */
    public array $extraToppings;

    /**
     * Constructor with too many parameters - demonstrates the problem.
     *
     * @param string $size          Pizza size
     * @param bool   $cheese        Whether to include cheese
     * @param bool   $pepperoni     Whether to include pepperoni
     * @param bool   $bacon         Whether to include bacon
     * @param bool   $mushrooms     Whether to include mushrooms
     * @param bool   $pineapple     Whether to include pineapple
     * @param bool   $jalapenos     Whether to include jalapenos
     * @param array<string> $extraToppings Additional toppings
     */
    public function __construct(
        string $size = 'medium',
        bool $cheese = false,
        bool $pepperoni = false,
        bool $bacon = false,
        bool $mushrooms = false,
        bool $pineapple = false,
        bool $jalapenos = false,
        array $extraToppings = []
    ) {
        $this->size = $size;
        $this->cheese = $cheese;
        $this->pepperoni = $pepperoni;
        $this->bacon = $bacon;
        $this->mushrooms = $mushrooms;
        $this->pineapple = $pineapple;
        $this->jalapenos = $jalapenos;
        $this->extraToppings = $extraToppings;
    }

    /**
     * Get description of the pizza.
     *
     * @return string
     */
    public function getDescription(): string
    {
        $description = "{$this->size} pizza with ";
        
        $toppings = [];
        if ($this->cheese) {
            $toppings[] = 'cheese';
        }
        if ($this->pepperoni) {
            $toppings[] = 'pepperoni';
        }
        if ($this->bacon) {
            $toppings[] = 'bacon';
        }
        if ($this->mushrooms) {
            $toppings[] = 'mushrooms';
        }
        if ($this->pineapple) {
            $toppings[] = 'pineapple';
        }
        if ($this->jalapenos) {
            $toppings[] = 'jalapenos';
        }
        $toppings = array_merge($toppings, $this->extraToppings);

        if (empty($toppings)) {
            $description .= 'no toppings';
        } else {
            $description .= implode(', ', $toppings);
        }

        return $description;
    }

    /**
     * Get the price of the pizza.
     *
     * @return float
     */
    public function getPrice(): float
    {
        $basePrice = match($this->size) {
            'small' => 8.99,
            'medium' => 12.99,
            'large' => 16.99,
            default => 12.99
        };

        $toppingPrice = 1.50;
        $toppingCount = 0;
        
        if ($this->cheese) {
            $toppingCount++;
        }
        if ($this->pepperoni) {
            $toppingCount++;
        }
        if ($this->bacon) {
            $toppingCount++;
        }
        if ($this->mushrooms) {
            $toppingCount++;
        }
        if ($this->pineapple) {
            $toppingCount++;
        }
        if ($this->jalapenos) {
            $toppingCount++;
        }
        $toppingCount += count($this->extraToppings);

        return round($basePrice + ($toppingCount * $toppingPrice), 2);
    }
}