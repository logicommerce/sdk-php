<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\CustomTagDataParametersGroup;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\UserCustomTagParametersValidator;

/**
 * This is the user model (creating/updating user) custom tags parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class UserCustomTagParametersGroup extends ParametersGroup {

    protected int $customTagId;

    protected ?CustomTagDataParametersGroup $data = null;

    /**
     * Sets the customTagId parameter for this parameters group.
     *
     * @param int $customTagId
     *
     * @return void
     */
    public function setCustomTagId(int $customTagId): void {
        $this->customTagId = $customTagId;
    }

    /**
     * Sets the value parameter for this parameters group.
     *
     * @param string $value
     * @return void
     */
    public function setValue(string $value): void {
        $customTagDataParametersGroup = new CustomTagDataParametersGroup();
        $customTagDataParametersGroup->setValue($value);
        $this->setData($customTagDataParametersGroup);
    }

    /**
     * Sets the data parameter for this parameters group.
     *
     * @param CustomTagDataParametersGroup $data
     *
     * @return void
     */
    public function setData(CustomTagDataParametersGroup $data): void {
        $this->data = $data;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): UserCustomTagParametersValidator {
        return new UserCustomTagParametersValidator();
    }
}
