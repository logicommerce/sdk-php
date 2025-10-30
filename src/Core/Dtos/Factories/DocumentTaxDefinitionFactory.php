<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Documents\Transactions\DocumentTaxDefinition;

/**
 * This class will return the kind of basket row we need.
 *
 * @see DocumentTaxDefinitionFactory::getElement()
 * @see DocumentTaxDefinitionFactory::getBasketTax()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class DocumentTaxDefinitionFactory extends Factory {

	protected const TYPE = 'type';

	protected const CLASS_SUFFIX = 'DocumentTaxDefinition';

	protected const NAMESPACE = 'SDK\Dtos\Documents\Transactions';

	/**
	 * Returns the needed type of basket row.
	 *
	 * @return DocumentTaxDefinition|NULL
	 */
	public static function getDocumentTax(array $data = []): ?DocumentTaxDefinition
	{
		return self::getItem($data);
	}

	/**
	 *
	 * @see \SDK\Core\Dtos\Factory::getElement()
	 */
	public static function getElement(array $data = []): ?DocumentTaxDefinition
	{
		return self::getDocumentTax($data);
	}
}
