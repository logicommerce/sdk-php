<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Basket\AppliedTax;

/**
 * This class will return the kind of applied tax we need.
 *
 * @see Factory::getElement()
 * @see AppliedTaxFactory::getBasketTax()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class AppliedTaxFactory extends Factory {

		protected const TYPE = 'type';

		protected const NAMESPACE = 'SDK\Dtos\Basket\AppliedTaxes';

		/**
		 * Returns the needed type of applied tax.
		 *
		 * @return AppliedTax|NULL
		 */
		public static function getAppliedTax(array $data = []): ?AppliedTax {
				return self::getItem($data);
		}

		/**
		 *
		 * @see \SDK\Core\Dtos\Factory::getElement()
		 */
		public static function getElement(array $data = []): ?AppliedTax {
				return self::getAppliedTax($data);
		}
}