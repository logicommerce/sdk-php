<?php

declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Validators\PluginDataParametersValidator;

/**
 * This is the plugin data parameters group class.
 * 
 * @see PluginDataParametersGroup::setAction()
 * @see PluginDataParametersGroup::getAction()
 * @see PluginDataParametersGroup::setData()
 * 
 * @package SDK\Core\Services\Parameters\Groups
 */
class PluginDataParametersGroup extends ParametersGroup {

    protected string $action;

    protected array $data;

    /**
     * Sets the action parameter for this parameters group.
     *
     * @param string $action
     *
     * @return void
     */
    public function setAction(string $action): void {
        $this->action = $action;
    }


    /**
     * Returns the action value.
     *
     * @return string
     */
    public function getAction(): string {
        return $this->action;
    }


    /**
     * Sets the data parameter for this parameters group.
     *
     * @param array $data
     *
     * @return void
     */
    public function setData(array $data): void {
        $this->data = $data;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): PluginDataParametersValidator {
        return new PluginDataParametersValidator();
    }
}
