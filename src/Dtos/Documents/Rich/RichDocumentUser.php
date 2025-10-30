<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\Gender;

/**
 * This is the rich document user class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentUser::getEmail()
 * @see RichDocumentUser::getLastUsed()
 * @see RichDocumentUser::getGender()
 * @see RichDocumentUser::getBillingAddress()
 * @see RichDocumentUser::getShippingAddress()
 * @see RichDocumentUser::getCustomTags()
 * @see RichDocumentUser::getAdditionalInfo()
 * 
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentUser extends Element{
    use ElementTrait, EnumResolverTrait;

    protected string $email = '';
    
    protected ?RichDateTime $lastUsed = null;
    
    protected string $gender = '';
    
    protected ?RichDocumentUserBillingAddress $billingAddress = null;
    
    protected ?RichDocumentUserShippingAddress $shippingAddress = null;
    
    protected array $customTags = [];
    
    protected ?RichDocumentUserAdditional $additionalInfo = null;

    /**
     * Returns the rich document user email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the rich document user lastUsed.
     *
     * @return RichDateTime|NULL
     */
    public function getLastUsed(): ?RichDateTime {
        return $this->lastUsed;
    }

    protected function setLastUsed(array $lastUsed): void {
        $this->lastUsed = new RichDateTime($lastUsed);
    }

    /**
     * Returns the rich document user gender.
     *
     * @return string
     */
    public function getGender(): string {
        return $this->getEnum(Gender::class, $this->gender, Gender::UNDEFINED);
    }

    /**
     * Returns the rich document user billingAddress.
     *
     * @return RichDocumentUserBillingAddress|NULL
     */
    public function getBillingAddress(): ?RichDocumentUserBillingAddress {
        return $this->billingAddress;
    }

    protected function setBillingAddress(array $billingAddress): void {
        $this->billingAddress = new RichDocumentUserBillingAddress($billingAddress);
    }

    /**
     * Returns the rich document user shippingAddress.
     *
     * @return RichDocumentUserShippingAddress|NULL
     */
    public function getShippingAddress(): ?RichDocumentUserShippingAddress {
        return $this->shippingAddress;
    }

    protected function setShippingAddress(array $shippingAddress): void {
        $this->shippingAddress = new RichDocumentUserShippingAddress($shippingAddress);
    }

    /**
     * Returns the rich document user customTags. 
     *
     * @return RichDocumentCustomTag[]
     */
    public function getCustomTags(): array {
        return $this->customTags;
    }

    protected function setCustomTags(array $customTags): void {
        $this->customTags = $this->setArrayField($customTags, RichDocumentCustomTag::class);
    }

    /**
     * Returns the rich document user additionalInfo.
     *
     * @return RichDocumentUserAdditional|NULL
     */
    public function getAdditionalInfo(): ?RichDocumentUserAdditional {
        return $this->additionalInfo;
    }

    protected function setAdditionalInfo(array $additionalInfo): void {
        $this->additionalInfo = new RichDocumentUserAdditional($additionalInfo);
    }

}









