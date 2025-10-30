<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the shipper class.
 * The shippers information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Shipper::getLogo()
 * @see Shipper::getLanguage()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class Shipper {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected string $logo = '';

    protected ?ShipperLanguage $language = null;

    /**
     * Returns the shipper logo.
     *
     * @return string
     */
    public function getLogo(): string {
        return $this->logo;
    }

    /**
     * Returns the shipper language object.
     *
     * @return ShipperLanguage|NULL
     */
    public function getLanguage(): ?ShipperLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new ShipperLanguage($language);
    }
}
