<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Documents\Transactions\DocumentAppliedTax;

/**
 * This class will return the kind of basket row we need.
 *
 * @see Factory::getElement()
 * @see DocumentAppliedTaxFactory::getBasketTax()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class DocumentAppliedTaxFactory extends Factory {

		protected const TYPE = 'type';

		protected const CLASS_SUFFIX = 'DocumentAppliedTax';

		protected const NAMESPACE = 'SDK\Dtos\Documents\Transactions';

		/**
		 * Returns the needed type of basket row.
		 *
		 * @return DocumentAppliedTax|NULL
		 */
		public static function getDocumentAppliedTax(array $data = []): ?DocumentAppliedTax {
				return self::getItem($data);
		}

		/**
		 *
		 * @see \SDK\Core\Dtos\Factory::getElement()
		 */
		public static function getElement(array $data = []): ?DocumentAppliedTax {
				return self::getDocumentAppliedTax($data);
		}
}