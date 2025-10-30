<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the physical location parameters validation trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait PhysicalLocationParametersValidatorTrait {

    protected function validateVisibleOnMap($visibleOnMap): ?bool {
        return $this->validateBoolean($visibleOnMap);
    }

    protected function validateDeliveryPoint($deliveryPoint): ?bool {
        return $this->validateBoolean($deliveryPoint);
    }

    protected function validateReturnPoint($returnPoint): ?bool {
        return $this->validateBoolean($returnPoint);
    }
    
}
