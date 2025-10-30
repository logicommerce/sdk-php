<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\PhysicalLocationParametersGroup;
use SDK\Services\Parameters\Validators\Basket\DeliveriesParametersValidator;

/**
 * This is the basket model (deliveries resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class DeliveriesParametersGroup extends PhysicalLocationParametersGroup {

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): DeliveriesParametersValidator {
        return new DeliveriesParametersValidator();
    }
}
