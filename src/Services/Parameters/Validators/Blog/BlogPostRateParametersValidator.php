<?php

namespace SDK\Services\Parameters\Validators\Blog;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\RateParametersValidatorTrait;


/**
 * This is the blog post rate parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Blog
 */
class BlogPostRateParametersValidator extends ParametersValidator {
    use RateParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['rating'];
}
