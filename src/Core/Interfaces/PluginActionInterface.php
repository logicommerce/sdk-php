<?php declare(strict_types=1);

namespace SDK\Core\Interfaces;

use SDK\Services\Parameters\Groups\PluginDataParametersGroup;

/**
 * This is the PluginActionInterface interface
 *
 * @see PluginActionInterface::getParametersGroup()
 *
 * @see Request
 *
 * @package SDK\Core\Interfaces
 */
interface PluginActionInterface {

    public function getParametersGroup(): PluginDataParametersGroup;

}
