<?php

namespace SDK\Dtos\Basket\BasketWarnings;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Dtos\Factories\BasketWarningAttributeFactory;
use SDK\Enums\BasketWarningCode;
use SDK\Enums\BasketWarningSeverity;

/**
 * This is the basket warning class.
 * The basket warnings information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketWarning::getCode()
 * @see BasketWarning::getHashes()
 * @see BasketWarning::getAttributes()
 *
 * @see ElementTrait
 * @see BasketWarningCode
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Basket\BasketWarnings
 */
class BasketWarning {
    use ElementTrait, EnumResolverTrait;

    protected string $code = '';

    protected string $severity = '';

    protected array $hashes = [];

    protected array $attributes = [];

    /**
     * Returns the warning code.
     *
     * @return string
     */
    public function getCode(): string { // ENUM
        return $this->getEnum(BasketWarningCode::class, $this->code, BasketWarningCode::NOT_AVAILABLE_PRODUCT);
    }

    /**
     * Returns the warning severity.
     *
     * @return string
     */
    public function getSeverity(): string { // ENUM
        return $this->getEnum(BasketWarningSeverity::class, $this->severity, BasketWarningseverity::INFO);
    }

    /**
     * Returns the warning hashes.
     *
     * @return array
     */
    public function getHashes(): array {
        return $this->hashes;
    }

    /**
     * Returns the warning attributes.
     *
     * @return BasketWarningAttribute[]
     */
    public function getAttributes(): array {
        return $this->attributes;
    }

    protected function setAttributes(array $attributes): void {
        $this->attributes = $this->setArrayField($attributes, BasketWarningAttributeFactory::class);
    }
}
