<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow;

/**
 * This class will return the kind of Document row we need.
 *
 * @see Factory::getElement()
 * @see RichReturnProcessDocumentRowFactory::getRichReturnProcessDocumentRow()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class RichReturnProcessDocumentRowFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Documents\Rich\RichReturnProcessDocumentRow';

    /**
     * Returns the needed type of Document row.
     *
     * @return RichReturnProcessDocumentRow|NULL
     */
    public static function getRichReturnProcessDocumentRow(array $data = []): ?RichReturnProcessDocumentRow {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?RichReturnProcessDocumentRow {
        return self::getRichReturnProcessDocumentRow($data);
    }
}
