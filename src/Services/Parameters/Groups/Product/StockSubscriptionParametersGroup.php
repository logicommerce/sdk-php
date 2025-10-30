<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Product\StockSubscriptionParametersValidator;

/**
 * This is the product model (stock subscription resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class StockSubscriptionParametersGroup extends ParametersGroup {

    protected string $email;

    /**
     * Sets the email parameter for this parameters group.
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): StockSubscriptionParametersValidator {
        return new StockSubscriptionParametersValidator();
    }
}
