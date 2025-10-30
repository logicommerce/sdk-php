<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\VerifyParametersValidator;

/**
 * This is the user model (verify user resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class VerifyParametersGroup extends ParametersGroup {

    protected string $uniqueId;

    /**
     * Sets the uniqueId parameter for this parameters group.
     *
     * @param string $uniqueId
     *
     * @return void
     */
    public function setUniqueId(string $uniqueId): void {
        $this->uniqueId = $uniqueId;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): VerifyParametersValidator {
        return new VerifyParametersValidator();
    }
}
