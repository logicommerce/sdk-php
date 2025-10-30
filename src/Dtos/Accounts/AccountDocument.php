<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the account base document main class.
 * The account base document information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see AccountDocument::getDocumentNumber()
 * @see AccountDocument::getDate()
 * @see AccountDocument::getDeliveryDate()
 *
 * @see Element
 * @uses IdentifiableElementTrait
 * @uses IntegrableElementTrait
 *
 * @package SDK\Dtos\Accounts
 */
abstract class AccountDocument extends Element {
    use IdentifiableElementTrait, IntegrableElementTrait;

    protected string $documentNumber = '';

    protected ?Date $date = null;

    protected ?Date $deliveryDate = null;

    /**
     * Returns the order document number.
     *
     * @return string
     */
    public function getDocumentNumber(): string {
        return $this->documentNumber;
    }

    /**
     * Returns the order date.
     *
     * @return Date|NULL
     */
    public function getDate(): ?Date {
        return $this->date;
    }

    protected function setDate(string $date): void {
        $this->date = Date::create($date);
    }

    /**
     * Returns the order delivery date.
     *
     * @return Date|NULL
     */

    public function getDeliveryDate(): ?Date {
        return $this->deliveryDate;
    }

    protected function setDeliveryDate(string $deliveryDate): void {
        $this->deliveryDate = Date::create($deliveryDate);
    }
}
