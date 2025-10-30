<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Documents\Rich\RichDocumentDelivery;
use SDK\Dtos\Documents\Rich\RichPickingModeDocumentDelivery;

/**
 * This class will return the kind of RichDocumentDelivery we need.
 *
 * @see Factory::getElement()
 * @see RichPickingModeDocumentDeliveryFactory::getRichPickingModeDocumentDelivery()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class RichPickingModeDocumentDeliveryFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Documents\Rich';

    protected const CLASS_PREFIX = 'Rich';

    protected const CLASS_SUFFIX = 'PickingDocumentDelivery';

    /**
     * Returns the needed type of RichPickingModeDocumentDelivery.
     *
     * @return RichPickingModeDocumentDelivery|NULL
     */
    public static function getRichPickingModeDocumentDelivery(array $data = []): ?RichPickingModeDocumentDelivery {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?RichPickingModeDocumentDelivery {
        return self::getRichPickingModeDocumentDelivery($data);
    }
}
