<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Basket;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the basket custom tags validation class.
 *
 * @package SDK\Services\Parameters\Validators\Basket
 */
class EditBasketCustomTagsParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = [ 'customTags' ];

    protected function validateCustomTags($customTags): ?bool {
        if (!is_array($customTags) || empty($customTags)) {
            return null;
        }
        return true;
    }
}
