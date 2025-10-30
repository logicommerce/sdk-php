<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Basket\Basket;
use SDK\Dtos\User\User;

/**
 * This is the factory class for creating a User from a Basket.
 *
 * @see BasketToUserFactory::create()
 * @see BasketToUserFactory::getElement()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class BasketToUserFactory extends Factory {

    /**
     * Creates a User object from the provided data.
     *
     * @param array $data
     * @return User|null
     */
    public static function create(array $data): ?User {
        $basket = new Basket($data);
        return $basket?->getBasketUser()?->getUser();
    }

    public static function getElement(array $data = []): ?User {
        return self::create($data);
    }
}
