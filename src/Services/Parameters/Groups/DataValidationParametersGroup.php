<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\DataValidationParametersValidator;

/**
 * This is the data validation model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class DataValidationParametersGroup extends ParametersGroup {

    protected string $type;

    /**
     * Sets the data validation type parameter for this parameters group.
     *
     * @param string $type
     *
     * @return void
     */
    public function setType(string $type): void {
        $this->type = $type;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): DataValidationParametersValidator {
        return new DataValidationParametersValidator();
    }
}
