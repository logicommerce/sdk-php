<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Blog;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;

/**
 * This is the blog post add comment parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Blog
 */
class AddBlogPostCommentParametersValidator extends ParametersValidator {
    use EmailParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['comment', 'nick'];

    protected function validateComment($comment): ?bool {
        return $this->validateString($comment);
    }

    protected function validateNick($nick): ?bool {
        return $this->validateString($nick);
    }

    protected function validateCommentId($commentId): ?bool {
        if (is_null($commentId) || $commentId === 0) {
            return true;
        }
        return $this->validatePositiveNumeric($commentId);
    }
}
