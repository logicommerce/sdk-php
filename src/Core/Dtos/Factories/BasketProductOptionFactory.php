<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Basket\BasketRows\Option;

/**
 * This class will return the kind of basket product option we need.
 *
 * @see Factory::getElement()
 * @see BasketProductOptionFactory::getOption()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class BasketProductOptionFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Basket\BasketRows\Options';

    protected const CLASS_SUFFIX = 'Option';

    /**
     * Returns the needed type of basket product option.
     *
     * @return Option|NULL
     */
    public static function getOption(array $data = []): ?Option {
        return self::getItem($data);
    }

    public static function getElement(array $data = []): ?Option {
        return self::getOption($data);
    }
}
