<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\AddSaveForLaterListRowParametersValidator;

/**
 * This is the add save for later list rows parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class AddSaveForLaterListRowParametersGroup extends ParametersGroup {

    protected string $basketRowHash;

    /**
     * Sets the Hash identifier of the shopping cart row from which to create a row in the 'saver for later list'.
     *
     * @param string $basketRowHash
     *
     * @return void
     */
    public function setBasketRowHash(string $basketRowHash): void {
        $this->basketRowHash = $basketRowHash;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddSaveForLaterListRowParametersValidator {
        return new AddSaveForLaterListRowParametersValidator();
    }
}
