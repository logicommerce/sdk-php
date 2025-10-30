<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\PluginAccountIdParametersValidator;

/**
 * This is the plugin properties parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class PluginAccountIdParametersGroup extends ParametersGroup {

    protected int $pluginAccountId;

    /**
     * Sets the pluginAccountId parameter for this parameters group.
     *
     * @param int $pluginAccountId
     *
     * @return void
     */
    public function setPluginAccountId(int $pluginAccountId): void {
        $this->pluginAccountId = $pluginAccountId;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): PluginAccountIdParametersValidator {
        return new PluginAccountIdParametersValidator();
    }
}
