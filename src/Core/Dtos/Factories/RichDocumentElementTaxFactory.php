<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Documents\Rich\RichDocumentElementTax;

/**
 * This class will return the kind of rich document tax we need.
 *
 * @see Factory::getElement()
 * @see RichDocumentElementTaxFactory::getRichDocumentElementTax()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class RichDocumentElementTaxFactory extends Factory {

    protected const TYPE = 'type';

    protected const NAMESPACE = 'SDK\Dtos\Documents\Rich\RichDocumentElementTaxes';

    /**
     * Returns the needed type of rich document tax.
     *
     * @return RichDocumentElementTax|NULL
     */
    public static function getRichDocumentElementTax(array $data = []): ?RichDocumentElementTax {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?RichDocumentElementTax {
        return self::getRichDocumentElementTax($data);
    }
}
