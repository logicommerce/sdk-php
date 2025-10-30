<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\WebhookParametersValidator;

/**
 * This is the webhook parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class WebhookParametersGroup extends ParametersGroup {

    protected string $pluginModule;

    protected array $params;

    protected string $body;

    /**
     * Sets the pluginModule parameter for this parameters group.
     *
     * @param string $pluginModule
     *
     * @return void
     */
    public function setPluginModule(string $pluginModule): void {
        $this->pluginModule = $pluginModule;
    }

    /**
     * Sets the params parameter for this parameters group.
     *
     * @param array $params
     *
     * @return void
     */
    public function setParams(array $params): void {
        $this->params = $params;
    }

    /**
     * Sets the body parameter for this parameters group.
     *
     * @param string $body
     *
     * @return void
     */
    public function setBody(string $body): void {
        $this->body = $body;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): WebhookParametersValidator {
        return new WebhookParametersValidator();
    }
}
