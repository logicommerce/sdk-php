<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Basket\BasketWarnings\BasketWarningAttribute;

/**
 * This class will return the kind of basket warning attribute we need.
 *
 * @see Factory::getElement()
 * @see BasketWarningAttributeFactory::getWarningAttribute()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class BasketWarningAttributeFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Basket\BasketWarnings';

    protected const CLASS_PREFIX = 'BasketWarning';

    protected const CLASS_SUFFIX = 'Attribute';

    /**
     * Returns the needed type of basket warning.
     *
     * @return BasketWarningAttribute|NULL
     */
    public static function getWarningAttribute(array $data = []): ?BasketWarningAttribute {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?BasketWarningAttribute {
        return self::getWarningAttribute($data);
    }
}
