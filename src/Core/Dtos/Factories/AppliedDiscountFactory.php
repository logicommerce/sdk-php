<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Basket\AppliedDiscount;
use SDK\Enums\DiscountType;

/**
 * This class will return the kind of applied discount we need.
 *
 * @see Factory::getElement()
 * @see AppliedDiscountFactory::getAppliedDiscount()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class AppliedDiscountFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Basket\AppliedDiscounts';

    protected const CLASS_PREFIX = 'AppliedDiscount';

    /**
     * Returns the needed type of applied discount.
     *
     * @return AppliedDiscount|NULL
     */
    public static function getAppliedDiscount(array $data = []): ?AppliedDiscount {
        return static::getItem($data);
    }

    public static function getElement(array $data = []): ?AppliedDiscount {
        return static::getAppliedDiscount($data);
    }

    protected static function prepareClassName(string $name): string {
        if ($name === DiscountType::MXN) {
            return 'MxN';
        }
        return parent::prepareClassName($name);
    }
}
