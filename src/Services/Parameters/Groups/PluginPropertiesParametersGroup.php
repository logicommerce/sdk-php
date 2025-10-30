<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\PluginPropertiesParametersValidator;

/**
 * This is the plugin properties parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class PluginPropertiesParametersGroup extends ParametersGroup {

    protected string $module;

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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): PluginPropertiesParametersValidator {
        return new PluginPropertiesParametersValidator();
    }
}
