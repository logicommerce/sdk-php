<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Settings\BasketStockLockingSettings;

/**
 * Class SettingsBasketStockLockingFactory
 *
 * @see SettingsBasketStockLockingFactory::getElement()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class SettingsBasketStockLockingFactory extends Factory {

    public static function getElement(array $data = []): ?BasketStockLockingSettings {
        return new BasketStockLockingSettings($data['basketStockLockingSettings']);
    }
}
