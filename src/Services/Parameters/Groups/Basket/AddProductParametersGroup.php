<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\Traits\IdentifiableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Basket\AddProductParametersValidator;

/**
 * This is the basket model (add product resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class AddProductParametersGroup extends ProductParametersGroup {
    use IdentifiableItemsParametersGroupTrait;

    protected string $mode;

    /**
     * Sets the mode parameter for this parameters group.
     *
     * @param string $mode
     *
     * @return void
     */
    public function setMode(string $mode): void {
        $this->mode = $mode;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddProductParametersValidator {
        return new AddProductParametersValidator();
    }
}
