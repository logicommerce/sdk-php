<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the shipping type class.
 * The shipping type information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ShippingType::getPriority()
 * @see ShippingType::getApplyTaxRedefinitions()
 * @see ShippingType::getSectionsWithTaxIncluded()
 * @see ShippingType::getRestrictive()
 * @see ShippingType::getDisplayPriority()
 * @see ShippingType::getShipper()
 * @see ShippingType::getLanguage()
 * @see ShippingType::getAdditionalData()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class ShippingType {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, ElementNameTrait;

    protected int $priority = 0;

    protected bool $applyTaxRedefinitions = false;

    protected bool $sectionsWithTaxIncluded = false;

    protected bool $restrictive = false;

    protected int $displayPriority = 0;

    protected ?Shipper $shipper = null;

    protected ?ShippingTypeLanguage $language = null;

    protected array $additionalData = [];

    /**
     * Returns the shipping type priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the shipping type apply tax redefinitions.
     *
     * @return bool
     */
    public function getApplyTaxRedefinitions(): bool {
        return $this->applyTaxRedefinitions;
    }

    /**
     * Returns the shipping type sections with tax included.
     *
     * @return bool
     */
    public function getSectionsWithTaxIncluded(): bool {
        return $this->sectionsWithTaxIncluded;
    }

    /**
     * Returns the shipping type restrictive.
     *
     * @return bool
     */
    public function getRestrictive(): bool {
        return $this->restrictive;
    }

    /**
     * Returns the shipping type display priority.
     *
     * @return int
     */
    public function getDisplayPriority(): int {
        return $this->displayPriority;
    }

    /**
     * Returns the shipping type shipper.
     *
     * @return Shipper|NULL
     */
    public function getShipper(): ?Shipper {
        return $this->shipper;
    }

    protected function setShipper(array $shipper): void {
        $this->shipper = new Shipper($shipper);
    }

    /**
     * Returns the shipping type language.
     *
     * @return ShippingTypeLanguage|NULL
     */
    public function getLanguage(): ?ShippingTypeLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new ShippingTypeLanguage($language);
    }

    /**
     * Returns the shipping type additional data.
     *
     * @return array
     */
    public function getAdditionalData(): array {
        return $this->additionalData;
    }
}
