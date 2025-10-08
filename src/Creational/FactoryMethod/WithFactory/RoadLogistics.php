<?php

namespace DesignPatterns\Creational\FactoryMethod\WithFactory;

use DesignPatterns\Creational\FactoryMethod\Truck;
use DesignPatterns\Creational\FactoryMethod\ITransport;

/**
 * Concrete creator for road logistics.
 * Creates Truck transport instances.
 */
class RoadLogistics extends LogisticsFactory
{
    /**
     * {@inheritDoc}
     */
    public function createTransport(): ITransport
    {
        return new Truck();
    }

    /**
     * {@inheritDoc}
     */
    public function getLogisticsType(): string
    {
        return 'road';
    }

    /**
     * Additional road-specific functionality.
     *
     * @return string Road logistics specific information
     */
    public function getRoadInfo(): string
    {
        return "🛣️ Road logistics: Suitable for inland destinations, faster delivery times";
    }
}