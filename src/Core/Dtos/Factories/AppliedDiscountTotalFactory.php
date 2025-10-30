<?php

namespace SDK\Core\Dtos\Factories;

/**
 * This class will return the kind of applied discount we need.
 *
 * @see Factory::getElement()
 * @see AppliedDiscountTotalFactory::getAppliedDiscount()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class AppliedDiscountTotalFactory extends AppliedDiscountFactory {

    protected const CLASS_SUFFIX = 'Total';
}
