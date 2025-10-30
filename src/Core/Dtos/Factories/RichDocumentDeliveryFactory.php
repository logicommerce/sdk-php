<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Documents\Rich\RichDocumentDelivery;

/**
 * This class will return the kind of RichDocumentDelivery we need.
 *
 * @see Factory::getElement()
 * @see RichDocumentDeliveryFactory::getRichDocumentDelivery()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class RichDocumentDeliveryFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Documents\Rich';

    protected const CLASS_PREFIX = 'Rich';

    protected const CLASS_SUFFIX = 'DocumentDelivery';

    /**
     * Returns the needed type of RichDocumentDelivery.
     *
     * @return RichDocumentDelivery|NULL
     */
    public static function getRichDocumentDelivery(array $data = []): ?RichDocumentDelivery {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?RichDocumentDelivery {
        return self::getRichDocumentDelivery($data);
    }
}
