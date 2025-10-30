<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Basket\BasketRow;

/**
 * This class will return the kind of basket row we need.
 *
 * @see Factory::getElement()
 * @see BasketRowFactory::getBasketRow()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class BasketRowFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Basket\BasketRows';

    /**
     * Returns the needed type of basket row.
     *
     * @return BasketRow|NULL
     */
    public static function getBasketRow(array $data = []): ?BasketRow {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?BasketRow {
        return self::getBasketRow($data);
    }
}
