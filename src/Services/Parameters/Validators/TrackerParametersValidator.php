<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Enums\RouteType;
use SDK\Enums\TrackerPageType;

/**
 * This is the tracker parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class TrackerParametersValidator extends ParametersValidator {

    protected function validateRouteType($routeType): ?bool {
        return $this->validateEnumerateValue($routeType, RouteType::class);
    }

    protected function validatePageType($pageType): ?bool {
        return $this->validateEnumerateValue($pageType, TrackerPageType::class);
    }
    
}
