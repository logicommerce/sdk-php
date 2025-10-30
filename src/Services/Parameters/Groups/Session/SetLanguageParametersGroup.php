<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Session;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Session\SetLanguageParametersValidator;

/**
 * This is the session model (set Session language resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Session
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
