<?php

namespace SDK\Dtos\User;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\OrderStatus;

/**
 * This is the user base document main class.
 * The user base document information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserDocument::getDocumentNumber()
 * @see UserDocument::getDate()
 * @see UserDocument::getStatus()
 * @see UserDocument::getSubstatus()
 *
 * @see Element
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\User
 */
abstract class UserDocument extends Element {
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
