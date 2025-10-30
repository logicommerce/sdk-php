<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the basket shipment parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class ShipmentParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['selectedShippingHash', 'shipmentHash'];

    protected function validateShipmentHash($shipmentHash): ?bool {
        return $this->validateString($shipmentHash);
    }

    protected function validateSelectedShippingHash($selectedShippingHash): ?bool {
        return $this->validateString($selectedShippingHash);
    }
}
