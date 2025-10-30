<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Enums\ProductType;
use SDK\Services\Parameters\Validators\Basket\AddProductParametersValidator;
use SDK\Services\Parameters\Validators\Basket\AddVoucherPurchaseParametersValidator;

/**
 * This is the basket model (add products resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class AddVoucherPurchaseParametersGroup extends AddProductParametersGroup {

    protected string $productType = ProductType::VOUCHER_PURCHASE;

    protected array $recipients;

    /**
     * @see AddProductVoucherPurchaseParametersValidator::getValidator()
     */
    protected function getValidator(): AddProductParametersValidator {
        return new AddVoucherPurchaseParametersValidator();
    }

    /**
     * Sets the product type for this parameters group.
     *
     * @param string $productType
     *
     * @return void
     */
    public function setProductType(string $productType): void {
        $this->productType = $productType;
    }    

    /**
     * Sets an array of recipients as a parameter for this parameters group.
     *
     * @param BasketVoucherPurchaseRecipientParameterGroup[] $recipients
     *
     * @return void
     */
    public function setRecipients(array $recipients): void {        
        $this->recipients = [];
        foreach ($recipients as $recipient) {
            $parameter = new BasketVoucherPurchaseRecipientParameterGroup();
            $parameter->setEmail($recipient['email']);
            $parameter->setMessage($recipient['message']);
            $this->addRecipient($parameter);
        }
    }

    /**
     * Adds a new option to the array of recipients for this parameters group.
     *
     * @param BasketVoucherPurchaseRecipientParameterGroup $recipient
     *
     * @return void
     */
    public function addRecipient(BasketVoucherPurchaseRecipientParameterGroup $recipient): void {
        $this->recipients ??= [];
        $this->recipients[] = $recipient;
    }
}
