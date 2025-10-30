<?php declare(strict_types=1);

namespace SDK\Core\Interfaces;

/**
 * This is the PluginTriggers interface
 *
 * @see PluginTriggers::getTriggers()
 *
 * @package SDK\Core\Interfaces
 */
interface PluginTriggers {

    public static function getTriggers(): array;

}
