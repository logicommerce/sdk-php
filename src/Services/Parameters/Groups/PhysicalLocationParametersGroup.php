<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\PhysicalLocationParametersGroup as CorePhysicalLocationParametersGroup;
use SDK\Services\Parameters\Validators\PhysicalLocationParametersValidator;

/**
 * This is the physical location model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class PhysicalLocationParametersGroup extends CorePhysicalLocationParametersGroup {

    protected string $languageCode;

    public function setLanguageCode(string $languageCode): void {
        $this->languageCode = $languageCode;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): PhysicalLocationParametersValidator {
        return new PhysicalLocationParametersValidator();
    }
}
