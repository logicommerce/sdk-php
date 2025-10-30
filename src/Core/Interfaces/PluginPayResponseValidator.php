<?php

declare(strict_types=1);

namespace SDK\Core\Interfaces;

use SDK\Core\Dtos\PluginProperties;
use SDK\Dtos\PayResponse;

/**
 * This is the PluginPayResponseValidator interface
 *
 * @see PluginPayResponseValidator::getParametersGroup()
 *
 * @see Request
 *
 * @package SDK\Core\Interfaces
 */
interface PluginPayResponseValidator {

    /**
     * Verify the pay response
     * 
     * @param int $orderId
     * @param PayResponse $payResponse
     * @param string $validationDataKey
     * 
     * @return bool
     */
    public static function verifyPayResponse(int $orderId, PayResponse $payResponse, string $validationDataKey): PayResponse;
}
