<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\User\ListRowReference;

/**
 * This class will return the kind of list row reference row we need.
 *
 * @see Factory::getElement()
 * @see ListRowReferenceFactory::getListRowReference()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class ListRowReferenceFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\User';

    protected const CLASS_PREFIX = 'ListRowReference';

    /**
     * Returns the needed type of basket row.
     *
     * @return ListRowReference|NULL
     */
    public static function getListRowReference(array $data = []): ?ListRowReference {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?ListRowReference {
        return self::getListRowReference($data);
    }
}
