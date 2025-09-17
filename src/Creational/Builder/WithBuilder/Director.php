<?php

namespace DesignPatterns\Creational\Builder\WithBuilder;

/**
 * Director class that defines the order of building steps.
 * Follows Single Responsibility Principle.
 */
class Director
{
    /**
     * Build a Margherita pizza.
     *
     * @param IPizzaBuilder $builder The builder to use
     * @return Pizza The constructed Margherita pizza
     */
    public function buildMargherita(IPizzaBuilder $builder): Pizza
    {
        return $builder
            ->setSize(PizzaSize::MEDIUM)
            ->addTopping(Topping::CHEESE)
            ->addTopping(Topping::MUSHROOMS)
            ->addTopping(Topping::TOMATOES)
            ->build();
    }

    /**
     * Build a Meat Lovers pizza.
     *
     * @param IPizzaBuilder $builder The builder to use
     * @return Pizza The constructed Meat Lovers pizza
     */
    public function buildMeatLovers(IPizzaBuilder $builder): Pizza
    {
        return $builder
            ->setSize(PizzaSize::LARGE)
            ->addTopping(Topping::CHEESE)
            ->addTopping(Topping::PEPPERONI)
            ->addTopping(Topping::BACON)
            ->addTopping(Topping::SAUSAGE)
            ->addTopping(Topping::HAM)
            ->build();
    }

    /**
     * Build a Veggie Supreme pizza.
     *
     * @param IPizzaBuilder $builder The builder to use
     * @return Pizza The constructed Veggie Supreme pizza
     */
    public function buildVeggieSupreme(IPizzaBuilder $builder): Pizza
    {
        return $builder
            ->setSize(PizzaSize::LARGE)
            ->addTopping(Topping::CHEESE)
            ->addTopping(Topping::MUSHROOMS)
            ->addTopping(Topping::BELL_PEPPERS)
            ->addTopping(Topping::ONIONS)
            ->addTopping(Topping::OLIVES)
            ->addTopping(Topping::TOMATOES)
            ->build();
    }

    /**
     * Build a Hawaiian pizza.
     *
     * @param IPizzaBuilder $builder The builder to use
     * @return Pizza The constructed Hawaiian pizza
     */
    public function buildHawaiian(IPizzaBuilder $builder): Pizza
    {
        return $builder
            ->setSize(PizzaSize::MEDIUM)
            ->addTopping(Topping::CHEESE)
            ->addTopping(Topping::HAM)
            ->addTopping(Topping::PINEAPPLE)
            ->build();
    }

    /**
     * Build a Spicy pizza.
     *
     * @param IPizzaBuilder $builder The builder to use
     * @return Pizza The constructed Spicy pizza
     */
    public function buildSpicy(IPizzaBuilder $builder): Pizza
    {
        return $builder
            ->setSize(PizzaSize::MEDIUM)
            ->addTopping(Topping::CHEESE)
            ->addTopping(Topping::PEPPERONI)
            ->addTopping(Topping::JALAPENOS)
            ->addTopping(Topping::HOT_SAUCE)
            ->build();
    }
}