<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Blog;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Blog\BlogSettingsParametersValidator;

/**
 * This is the Blog model (blog settings resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Blog
 */
class BlogSettingsParametersGroup extends ParametersGroup {

    protected string $languageCode;

    /**
     * Sets the language ISO code parameter for this parameters group.
     *
     * @param string $languageCode
     *
     * @return void
     */
    public function setLanguageCode(string $languageCode): void {
        $this->languageCode = $languageCode;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): BlogSettingsParametersValidator {
        return new BlogSettingsParametersValidator();
    }
}
