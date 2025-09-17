<?php

namespace DesignPatterns\Creational\Builder\WithBuilder;

/**
 * Concrete builder for creating Spicy pizzas.
 * Follows Liskov Substitution and Dependency Inversion Principles.
 */
class SpicyPizzaBuilder implements IPizzaBuilder
{
    /** @var IPizzaBuilder The internal builder instance */
    private IPizzaBuilder $builder;
    
    /** @var array<Topping> Allowed toppings for Spicy pizza */
    private const ALLOWED_TOPPINGS = [
        Topping::CHEESE,
        Topping::PEPPERONI,
        Topping::JALAPENOS,
        Topping::HOT_SAUCE,
        Topping::BACON,
        Topping::SAUSAGE,
    ];

    /**
     * Constructor with dependency injection.
     *
     * @param IPizzaBuilder $builder The builder instance to use
     */
    public function __construct(IPizzaBuilder $builder)
    {
        $this->builder = $builder;
        $this->reset();
    }

    /**
     * {@inheritDoc}
     */
    public function setSize(PizzaSize $size): self
    {
        $this->builder->setSize($size);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addTopping(Topping $topping): self
    {
        if (in_array($topping, self::ALLOWED_TOPPINGS, true)) {
            $this->builder->addTopping($topping);
        }
        
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeTopping(Topping $topping): self
    {
        $this->builder->removeTopping($topping);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function build(): Pizza
    {
        // Build classic Spicy: pepperoni, jalapenos, hot sauce
        $pizza = $this->builder
            ->addTopping(Topping::CHEESE)
            ->addTopping(Topping::PEPPERONI)
            ->addTopping(Topping::JALAPENOS)
            ->addTopping(Topping::HOT_SAUCE)
            ->build();
            
        $this->reset();
        
        return $pizza;
    }

    /**
     * {@inheritDoc}
     */
    public function reset(): void
    {
        $this->builder->reset();
    }
}