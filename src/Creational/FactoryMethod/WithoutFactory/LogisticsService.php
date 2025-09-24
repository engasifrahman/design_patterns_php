<?php

namespace DesignPatterns\Creational\FactoryMethod\WithoutFactory;

use InvalidArgumentException;
use DesignPatterns\Creational\FactoryMethod\Ship;
use DesignPatterns\Creational\FactoryMethod\Truck;

/**
 * Logistics service without Factory Method - demonstrates the problems.
 */
class LogisticsService
{
    /**
     * Deliver goods using specified transport type.
     * This method has multiple problems that Factory Method solves.
     *
     * @param string $transportType The type of transport ('truck', 'ship')
     * @param string $destination The delivery destination
     * @return string Delivery result
     * @throws InvalidArgumentException If transport type is invalid
     */
    public function deliverGoods(string $transportType, string $destination): string
    {
        // PROBLEM: Complex conditional logic, violates Open/Closed Principle once new types/logic are required
        if ($transportType === 'truck') {
            $transport = new Truck();
        } elseif ($transportType === 'ship') {
            $transport = new Ship();
        } else {
            throw new InvalidArgumentException("Invalid transport type: $transportType");
        }

        $plan = [
            "📦 Planning delivery to: $destination",
            "🚚 Transport type: " . $transport->getType(),
            "⚖️ Capacity: " . $transport->getCapacity() . " kg",
            "⏱️ Estimated time: " . $transport->getEstimatedTime($destination) . " hours",
            "➡️ " . $transport->deliver($destination)
        ];

        return implode("\n", $plan);
    }
}