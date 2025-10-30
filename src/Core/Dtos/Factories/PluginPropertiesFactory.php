<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Core\Dtos\PluginProperties;

/**
 * This class will return the kind of page we need.
 *
 * @see Factory
 * @see PluginPropertiesFactory::getElement()
 * @see PluginPropertiesFactory::getPluginProperties()
 *
 * @package SDK\Dtos\Factories
 */
abstract class PluginPropertiesFactory extends Factory {

    public const TYPE = 'pluginModule';

    protected const NAMESPACE = 'Plugins';

    protected const DEFAULT_CLASS = 'SDK\Dtos\Common\PluginProperties';

    protected const CLASS_SUFFIX = '\Dtos\Common\PluginProperties';

    protected const CLASS_SEPARATOR = '.';

    /**
     * Returns the needed type of payment system.
     *
     * @return PluginProperties|NULL
     */
    public static function getPluginProperties(array $data = []): ?PluginProperties {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?PluginProperties {
        return self::getPluginProperties($data);
    }
}
