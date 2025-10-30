<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\Gender;

/**
 * This is the main document user class.
 * The document user will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentUser::getUserId()
 * @see DocumentUser::getEmail()
 * @see DocumentUser::getLastUsed()
 * @see DocumentUser::getGender()
 * @see DocumentUser::getBillingAddress()
 * @see DocumentUser::getShippingAddress()
 * @see DocumentUser::getCustomTags()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents
 */
class DocumentUser extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait;

    protected int $userId = 0;

    protected string $email = '';

    protected string $lastUsed = '';

    protected string $gender = '';

    protected ?DocumentUserBillingAddress $billingAddress = null;

    protected ?DocumentUserShippingAddress $shippingAddress = null;

    protected array $customTags = [];

    /**
     * Returns internal identifier of the user.
     *
     * @return int
     */
    public function getUserId(): int {
        return $this->userId;
    }

    /**
     * Returns the user email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns last login by user.
     *
     * @return string
     */
    public function getLastUsed(): string {
        return $this->lastUsed;
    }

    /**
     * Returns gender of the user.
     *
     * @return string
     */
    public function getGender(): string {
        return $this->getEnum(Gender::class, $this->gender, '');
    }

    /**
     * Returns billing address of the user.
     *
     * @return DocumentUserBillingAddress|NULL
     */
    public function getBillingAddress(): ?DocumentUserBillingAddress {
        return $this->billingAddress;
    }

    protected function setBillingAddress(array $billingAddress): void {
        $this->billingAddress = new DocumentUserBillingAddress($billingAddress);
    }

    /**
     * Returns shipping address of the user.
     *
     * @return DocumentUserShippingAddress|NULL
     */
    public function getShippingAddress(): ?DocumentUserShippingAddress {
        return $this->shippingAddress;
    }

    protected function setShippingAddress(array $shippingAddress): void {
        $this->shippingAddress = new DocumentUserShippingAddress($shippingAddress);
    }

    /**
     * Returns custom tags of the user.
     *
     * @return DocumentCustomTag[]
     */
    public function getCustomTags(): array {
        return $this->customTags;
    }

    protected function setCustomTags(array $customTags): void {
        $this->customTags = $this->setArrayField($customTags, DocumentCustomTag::class);
    }
}
