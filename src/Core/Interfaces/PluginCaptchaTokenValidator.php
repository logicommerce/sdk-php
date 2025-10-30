<?php

declare(strict_types=1);

namespace SDK\Core\Interfaces;

use SDK\Core\Dtos\PluginProperties;

/**
 * This is the PluginCaptchaTokenValidator interface
 *
 * @see PluginCaptchaTokenValidator::getParametersGroup()
 *
 * @see Request
 *
 * @package SDK\Core\Interfaces
 */
interface PluginCaptchaTokenValidator {

    /**
     * Verify if the token is valid
     * 
     * @param string $token 
     * @param null|PluginProperties $pluginProperties 
     * @param string $action 
     * 
     * @return bool
     */
    public static function verifyToken(string $token, ?PluginProperties $pluginProperties = null, string $action = ''): bool;
}
