<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\User;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;

/**
 * This is the send wishlist parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\User
 */
class SendWishlistParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, EmailParametersValidatorTrait;

    protected const REQUIRED_PARAMS = ['productIdList', 'toName', 'toEmail', 'comment'];

    protected function validateProductIdList($productIdList): ?bool {
        return $this->validateIdList($productIdList);
    }

    protected function validateToName($toName): ?bool {
        return $this->validateString($toName);
    }

    protected function validateToEmail($toEmail): ?bool {
        return $this->validateEmail($toEmail);
    }

    protected function validateComment($comment): ?bool {
        return $this->validateString($comment);
    }
}
