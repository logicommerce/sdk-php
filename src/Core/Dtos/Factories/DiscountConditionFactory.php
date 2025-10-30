<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\BaseDiscountCondition;
use SDK\Core\Dtos\Factory;

/**
 * This class will return the kind of discount condition we need.
 *
 * @see Factory::getElement()
 * @see DiscountConditionFactory::getDiscountCondition()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class DiscountConditionFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Common\DiscountConditions';

    protected const CLASS_PREFIX = 'DiscountCondition';

    /**
     * Returns the needed type of applied discount.
     *
     * @return DiscountCondition|NULL
     */
    public static function getDiscountCondition(array $data = []): ?BaseDiscountCondition {
        return static::getItem($data);
    }

    public static function getElement(array $data = []): ?BaseDiscountCondition {
        return static::getDiscountCondition($data);
    }

    protected static function prepareClassName(string $name): string {
        return parent::prepareClassName($name);
    }
}
