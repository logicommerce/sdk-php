<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the basket shipments validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class ShipmentsParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['deliveryHash'];

    protected function validateDeliveryHash($hash): ?bool {
        return $this->validateString($hash);
    }

    protected function validateShipments($shipments): ?bool {
        if (!is_array($shipments) || empty($shipments)) {
            return null;
        }
        return true;
    }

    protected function validateProviderPickupPointHash($providerPickupPointHash): ?bool {
        return $this->validateString($providerPickupPointHash, 0);
    }
}
