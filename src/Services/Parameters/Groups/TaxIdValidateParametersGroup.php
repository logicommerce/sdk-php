<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\TaxIdValidateParametersValidator;

/**
 * This is the taxId validation parameters group class.
 * It holds the body sent to the taxId validation endpoint.
 *
 * @package SDK\Services\Parameters\Groups
 */
class TaxIdValidateParametersGroup extends ParametersGroup {

    protected string $taxId;

    protected string $countryCode;

    protected ?string $taxIdType = null;

    protected ?string $taxIdOwnerType = null;

    /**
     * Gets the taxId parameter for this parameters group.
     *
     * @return string
     */
    public function getTaxId(): string {
        return $this->taxId;
    }

    /**
     * Sets the taxId parameter for this parameters group.
     *
     * @param string $taxId
     *
     * @return void
     */
    public function setTaxId(string $taxId): void {
        $this->taxId = $taxId;
    }

    /**
     * Gets the countryCode parameter for this parameters group.
     *
     * @return string
     */
    public function getCountryCode(): string {
        return $this->countryCode;
    }

    /**
     * Sets the countryCode parameter for this parameters group.
     *
     * @param string $countryCode
     *
     * @return void
     */
    public function setCountryCode(string $countryCode): void {
        $this->countryCode = $countryCode;
    }

    /**
     * Gets the taxIdType parameter for this parameters group.
     *
     * @see \SDK\Enums\TaxIdType
     *
     * @return string|null
     */
    public function getTaxIdType(): ?string {
        return $this->taxIdType;
    }

    /**
     * Sets the taxIdType parameter for this parameters group.
     *
     * @see \SDK\Enums\TaxIdType
     *
     * @param string|null $taxIdType
     *
     * @return void
     */
    public function setTaxIdType(?string $taxIdType): void {
        $this->taxIdType = $taxIdType;
    }

    /**
     * Gets the taxIdOwnerType parameter for this parameters group.
     *
     * @see \SDK\Enums\TaxIdOwnerType
     *
     * @return string|null
     */
    public function getTaxIdOwnerType(): ?string {
        return $this->taxIdOwnerType;
    }

    /**
     * Sets the taxIdOwnerType parameter for this parameters group.
     *
     * @see \SDK\Enums\TaxIdOwnerType
     *
     * @param string|null $taxIdOwnerType
     *
     * @return void
     */
    public function setTaxIdOwnerType(?string $taxIdOwnerType): void {
        $this->taxIdOwnerType = $taxIdOwnerType;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): TaxIdValidateParametersValidator {
        return new TaxIdValidateParametersValidator();
    }
}
