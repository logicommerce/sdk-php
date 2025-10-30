<?php declare(strict_types=1);

namespace SDK\Core\Resources;

use SDK\Dtos\Common\Plugin;
use SDK\Services\PluginService;

/**
 * This is the plugin Trigger class in the LogiCommerce SDK package.
 * For execute actions when triggers
 *
 * @see PluginTriggers::executeTrigger()
 *
 * @package SDK\Core\Resources
 */
abstract class PluginTriggers {

    /**
     * Execute all plugin actions for a trigger event
     *
     * Return array with all actions result
     * @return array
     */

    public static function execute(string $triggerName, Plugin $plugin, $data) : array {
        $results = [];
        /** @var SDK\Services\PluginService */
        $pluginService = PluginService::getInstance();
        foreach($pluginService->getModuleTriggers($plugin->getModule()) as $trigger => $actions) {
            if($trigger === $triggerName) {
                foreach($actions as $action) {
                    $results[$action] = $pluginService->executePluginData(
                        $plugin->getId(), 
                        $plugin->getModule(),
                        $pluginService->getActionParametersGroup($triggerName, $plugin->getModule(), $action, $data)
                    );
                }
                break;
            }
        }
        return $results;
    }
}
