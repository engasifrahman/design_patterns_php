<?php

namespace DesignPatterns\Creational\FactoryMethod\WithFactory;

use DesignPatterns\Creational\FactoryMethod\ITransport;


/**
 * Abstract creator class that declares the factory method.
 * Follows the template method pattern for delivery planning.
 */
abstract class LogisticsFactory
{
    /**
     * Plan and execute a delivery to the specified destination.
     * This is the template method that uses the factory method.
     *
     * @param string $destination The delivery destination
     * @return string The delivery plan and confirmation
     */
    public function planDelivery(string $destination): string
    {
        $transport = $this->createTransport();
        
        $plan = [
            "📦 Planning delivery to: $destination",
            "🚚 Transport type: " . $transport->getType(),
            "⚖️ Capacity: " . $transport->getCapacity() . " kg",
            "⏱️ Estimated time: " . $transport->getEstimatedTime($destination) . " hours",
            "➡️ " . $transport->deliver($destination)
        ];

        return implode("\n", $plan);
    }

    /**
     * Factory method to create a transport instance.
     * Concrete subclasses must implement this method.
     *
     * @return ITransport
     */
    abstract public function createTransport(): ITransport;

    /**
     * Get logistics type name.
     *
     * @return string
     */
    abstract public function getLogisticsType(): string;
}