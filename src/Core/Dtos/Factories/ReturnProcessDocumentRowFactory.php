<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Documents\Rows\ReturnProcessDocumentRow;

/**
 * This class will return the kind of Document row we need.
 *
 * @see Factory::getElement()
 * @see DocumentRowFactory::getReturnProcessDocumentRow()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class ReturnProcessDocumentRowFactory extends Factory {

    protected const TYPE = 'type';

    protected const CLASS_PREFIX = 'ReturnProcessDocumentRow';

    protected const NAMESPACE = 'SDK\Dtos\Documents\Rows';

    /**
     * Returns the needed type of Document row.
     *
     * @return ReturnProcessDocumentRow|NULL
     */
    public static function getReturnProcessDocumentRow(array $data = []): ?ReturnProcessDocumentRow {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?ReturnProcessDocumentRow {
        return self::getReturnProcessDocumentRow($data);
    }
}
