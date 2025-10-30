<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Basket\PaymentSystem;

/**
 * This class will return the kind of page we need.
 *
 * @see Factory::getElement()
 * @see PaymentSystemFactory::getPaymentSystem()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class PaymentSystemFactory extends Factory {

    public const TYPE = 'module';

    protected const NAMESPACE = 'Plugins';

    protected const DEFAULT_CLASS = 'SDK\Dtos\Basket\PaymentSystem';

    protected const CLASS_SUFFIX = '\Dtos\Basket\PaymentSystem';

    protected const CLASS_SEPARATOR = '.';

    /**
     * Returns the needed type of payment system.
     *
     * @return PaymentSystem|NULL
     */
    public static function getPaymentSystem(array $data = []): ?PaymentSystem {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?PaymentSystem {
        return self::getPaymentSystem($data);
    }
}
