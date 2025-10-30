<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Resources\Date;

/**
 * This is the licenses class.
 * The licenses will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Licenses::getExpirationDate()
 * @see Licenses::getLicenses()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos
 */
class Licenses extends Element {
    use ElementTrait, ElementNameTrait;

    protected ?Date $expirationDate = null;

    protected array $licenses = [];

    /**
     * Returns the date when the licenses will be expired.
     *
     * @return Date|NULL
     */
    public function getExpirationDate(): ?Date {
        return $this->expirationDate;
    }

    protected function setExpirationDate(string $expirationDate): void {
        $this->expirationDate = Date::create($expirationDate);
    }

    /**
     * Returns the licenses.
     *
     * @return array
     */
    public function getLicenses(): array {
        return $this->licenses;
    }

    protected function setLicenses(array $licenses): void {
        $this->licenses = $this->setArrayField($licenses, License::class);
    }

}
