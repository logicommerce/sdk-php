<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the basket comment validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class CommentParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [ 'comment' ];

    protected function validateComment($comment): ?bool {
        return $this->validateString($comment);
    }
}
