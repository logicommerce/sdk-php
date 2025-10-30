<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Factory;

/**
 * This class will return the kind of page we need.
 *
 * @see Factory::getElement()
 * @see PaymentSystemAdditionalDataFactory::getPaymentSystem()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class PaymentSystemAdditionalDataFactory extends Factory {

    public const TYPE = 'module';

    protected const NAMESPACE = 'Plugins';

    protected const CLASS_SUFFIX = '\Dtos\Basket\PaymentSystemAdditionalData';

    protected const CLASS_SEPARATOR = '.';

    /**
     * Returns the needed type of additional data.
     *
     * @return Element|NULL
     */
    public static function getAdditionaData(array $data = []): ?Element {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?Element {
        return self::getAdditionaData($data);
    }
}
