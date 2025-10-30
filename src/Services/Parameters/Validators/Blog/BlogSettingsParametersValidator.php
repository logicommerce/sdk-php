<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Blog;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the blog settings parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Blog
 */
class BlogSettingsParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['languageCode'];

    protected function validateLanguageCode($languageCode): ?bool {
        return $this->validateString($languageCode);
    }
}
