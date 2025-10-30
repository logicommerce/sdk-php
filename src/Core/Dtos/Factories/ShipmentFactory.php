<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Basket\BaseShipment;
use SDK\Dtos\Basket\BasketShipment;
use SDK\Dtos\Basket\Shipment;

/**
 * This class will return the kind of shipment we need.
 *
 * @see Factory::getElement()
 * @see ShipmentFactory::getShipment()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class ShipmentFactory extends Factory {

    /**
     * Returns the needed type of shipment.
     *
     * @return BaseShipment|NULL
     */
    public static function getShipment(array $data = []): ?BaseShipment {
        if (isset($data['shippings'])) {
            return new Shipment($data);
        }
        return new BasketShipment($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?BaseShipment {
        return self::getShipment($data);
    }
}
