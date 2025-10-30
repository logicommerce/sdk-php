<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\SetLanguageParametersValidator;

/**
 * This is the user model (set user language resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class SetLanguageParametersGroup extends ParametersGroup {

    protected string $language;

    /**
     * Sets the language parameter for this parameters group.
     *
     * @param string $language
     *
     * @return void
     */
    public function setLanguage(string $language): void {
        $this->language = $language;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): SetLanguageParametersValidator {
        return new SetLanguageParametersValidator();
    }
}
