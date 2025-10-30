<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\PrevisionType;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the Prevision class.
 * The previsions of API stocks will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Prevision::getUnits()
 * @see Prevision::getIncomingDate()
 * @see Prevision::getPrevisionType()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class Prevision {
    use ElementTrait, EnumResolverTrait;

    protected int $units = 0;

    protected ?Date $incomingDate = null;

    protected string $previsionType = '';

    /**
     * Returns stock units on this prevision.
     *
     * @return int
     */
    public function getUnits(): int {
        return $this->units;
    }

    /**
     * Returns the date when the stock will be effective.
     *
     * @return Date|NULL
     */
    public function getIncomingDate(): ?Date {
        return $this->incomingDate;
    }

    protected function setIncomingDate(string $incomingDate): void {
        $this->incomingDate = Date::create($incomingDate);
    }

    /**
     * Returns the type of this prevision.
     *
     * @return string
     */
    public function getPrevisionType(): string { // ENUM
        return $this->getEnum(PrevisionType::class, $this->previsionType, PrevisionType::AVAILABLE);
    }
}
