<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\PType;

/**
 * This is the license class.
 * The license will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Licenses::getPId()
 * @see Licenses::getType()
 * @see Licenses::getUnits()
 * @see Licenses::getPType()
 * @see Licenses::getParameters()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 * @see EnumResolverTrait
 * 
 * @uses ElementTrait
 * @uses ElementNameTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos
 */
class License extends Element {
    use ElementTrait, ElementNameTrait, EnumResolverTrait;

    protected string $pId = '';

    protected string $type = '';

    protected int $units = 0;

    protected string $pType = '';

    protected array $parameters = [];

    /**
     * Returns the license pId.
     *
     * @return string
     */
    public function getPId(): string {
        return $this->pId;
    }

        /**
     * Returns the license type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

        /**
     * Returns the license units.
     *
     * @return int
     */
    public function getUnits(): int {
        return $this->units;
    }

    /**
     * Returns the license pPype.
     *
     * @return string
     */
    public function getPType(): string { // ENUM
        return $this->getEnum(PType::class, $this->pType, PType::ADDON);
    }

    /**
     * Returns the license parameters.
     *
     * @return array
     */
    public function getParameters(): array {
        return $this->parameters;
    }

    protected function setParameters(array $parameters): void {
        $this->parameters = $this->setArrayField($parameters, LicenseParameter::class);
    }

}
