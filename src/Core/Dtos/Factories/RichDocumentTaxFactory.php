<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Documents\Rich\RichDocumentTax;

/**
 * This class will return the kind of rich document tax we need.
 *
 * @see Factory::getElement()
 * @see RichDocumentTaxFactory::getRichDocumentTax()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class RichDocumentTaxFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Documents\Rich\RichDocumentTaxes';

    /**
     * Returns the needed type of rich document tax.
     *
     * @return RichDocumentTax|NULL
     */
    public static function getRichDocumentTax(array $data = []): ?RichDocumentTax {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?RichDocumentTax {
        return self::getRichDocumentTax($data);
    }
}
