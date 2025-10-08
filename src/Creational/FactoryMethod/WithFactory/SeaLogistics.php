<?php

namespace DesignPatterns\Creational\FactoryMethod\WithFactory;

use DesignPatterns\Creational\FactoryMethod\Ship;
use DesignPatterns\Creational\FactoryMethod\ITransport;

/**
 * Concrete creator for sea logistics.
 * Creates Ship transport instances.
 */
class SeaLogistics extends LogisticsFactory
{
    /**
     * {@inheritDoc}
     */
    public function createTransport(): ITransport
    {
        return new Ship();
    }

    /**
     * {@inheritDoc}
     */
    public function getLogisticsType(): string
    {
        return 'sea';
    }

    /**
     * Additional sea-specific functionality.
     *
     * @return string Sea logistics specific information
     */
    public function getSeaInfo(): string
    {
        return "🌊 Sea logistics: Suitable for international destinations, higher capacity";
    }
}