<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\PluginModuleParametersValidator;

/**
 * This is the plugins connectos type parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class PluginModuleParametersGroup extends ParametersGroup {

    protected string $module;

    protected string $navigationHash;

    /**
     * Sets the module parameter for this parameters group.
     *
     * @param string $module
     *
     * @return void
     */
    public function setModule(string $module): void {
        $this->module = $module;
    }

    /**
     * Returns the module parameter for this parameters group.
     *
     * @return string
     */
    public function getModule(): string {
        return $this->module;
    }

    /**
     * Sets the navigationHash parameter for this parameters group.
     *
     * @param string $navigationHash
     *
     * @return void
     */
    public function setNavigationHash(string $navigationHash): void {
        $this->navigationHash = $navigationHash;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): PluginModuleParametersValidator {
        return new PluginModuleParametersValidator();
    }
}
