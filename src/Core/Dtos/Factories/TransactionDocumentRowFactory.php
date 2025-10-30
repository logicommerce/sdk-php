<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Documents\Rows\TransactionDocumentRow;

/**
 * This class will return the kind of Document row we need.
 *
 * @see Factory::getElement()
 * @see DocumentRowFactory::getTransactionDocumentRow()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class TransactionDocumentRowFactory extends Factory {

    protected const TYPE = 'type';

    protected const CLASS_PREFIX = 'TransactionDocumentRow';

    protected const NAMESPACE = 'SDK\Dtos\Documents\Rows';

    /**
     * Returns the needed type of Document row.
     *
     * @return TransactionDocumentRow|NULL
     */
    public static function getTransactionDocumentRow(array $data = []): ?TransactionDocumentRow {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?TransactionDocumentRow {
        return self::getTransactionDocumentRow($data);
    }
}
