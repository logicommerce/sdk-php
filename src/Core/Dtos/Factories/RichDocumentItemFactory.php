<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Documents\Rich\RichDocumentItem;

/**
 * This class will return the kind of Document row we need.
 *
 * @see Factory::getElement()
 * @see RichDocumentItemFactory::getRichDocumentItem()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class RichDocumentItemFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Documents\Rich\RichDocumentItem';

    /**
     * Returns the needed type of Document row.
     *
     * @return RichDocumentItem|NULL
     */
    public static function getRichDocumentItem(array $data = []): ?RichDocumentItem {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?RichDocumentItem {
        return self::getRichDocumentItem($data);
    }
}
