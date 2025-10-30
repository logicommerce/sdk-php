<?php

namespace SDK\Core\Dtos;

/**
 * This is the plugin properties class.
 * The API plugin data will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Element
 *
 * @package SDK\Core\Dtos
 */
abstract class PluginProperties extends Element {

    protected int $pluginId = 0;

    protected string $pluginModule = '';

    /**
     * Returns the plugin id.
     *
     * @return int
     */
    public function getPluginId(): int {
        return $this->pluginId;
    }

    /**
     * Returns the plugin module.
     *
     * @return string
     */
    public function getPluginModule(): string {
        return $this->pluginModule;
    }
}
