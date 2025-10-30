<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Core\Dtos\PluginData;

/**
 * This class will return the kind plugin data we need.
 *
 * @see Factory
 * @see PluginActionsFactory::getElement()
 * @see PluginActionsFactory::getPluginActions()
 *
 * @package SDK\Dtos\Factories
 */
abstract class PluginActionsFactory extends Factory {

    public const TYPE = 'action';

    protected const NAMESPACE = 'Plugins';

    protected const DEFAULT_CLASS = 'SDK\Dtos\Common\PluginData';

    protected const CLASS_SUFFIX = '\Dtos\Actions\\';

    protected const CLASS_SEPARATOR = '.';

    /**
     * Returns the needed type of pluginData system.
     *
     * @return PluginData|NULL
     */
    public static function getPluginActions(array $data = []): ?PluginData {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?PluginData {
        return self::getPluginActions($data);
    }
}
