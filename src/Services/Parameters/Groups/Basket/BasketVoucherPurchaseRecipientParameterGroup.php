<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\BasketVoucherPurchaseRecipientParameterValidator;

/**
 * This is the basket model (edit product resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class BasketVoucherPurchaseRecipientParameterGroup extends ParametersGroup {
 
    protected string $email;    

    protected string $message;

    /**
     * Sets the email parameter for this parameters group.
     * * @param string $email
     * * @return void
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * Sets the message parameter for this parameters group.
     * * @param string $message
     * * @return void
     * 
     */
    public function setMessage(string $message): void {
        $this->message = $message;
    }


    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): BasketVoucherPurchaseRecipientParameterValidator {
        return new BasketVoucherPurchaseRecipientParameterValidator();
    }
}
