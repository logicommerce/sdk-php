<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Basket\BasketTax;

/**
 * This class will return the kind of basket row we need.
 *
 * @see Factory::getElement()
 * @see BasketTaxFactory::getBasketTax()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class BasketTaxFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Basket\BasketTaxes';

    /**
     * Returns the needed type of basket row.
     *
     * @return BasketTax|NULL
     */
    public static function getBasketTax(array $data = []): ?BasketTax {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?BasketTax {
        return self::getBasketTax($data);
    }
}
