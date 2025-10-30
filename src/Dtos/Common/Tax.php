<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\TaxType;

/**
 * This is the Taxes class.
 * The taxes information of API elements will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Tax::getTaxRate()
 * @see Tax::getRERate()
 * @see Tax::getValue()
 * @see Tax::getDefinitionName()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see ElementNameTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Common
 */
class Tax {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, ElementNameTrait, EnumResolverTrait;

    protected float $taxRate = 0.0;

    protected float $reRate = 0.0;
    
    protected string $definitionName = '';

	protected string $type = '';

    /**
     * Returns the tax rate.
     *
     * @return float
     */
    public function getTaxRate(): float {
        return $this->taxRate;
    }

    /**
     * Returns the tax equivalence surcharge.
     *
     * @return float
     */
    public function getRERate(): float {
        return $this->reRate;
    }

    /**
     * Returns the tax definition name.
     *
     * @return string
     */
    public function getDefinitionName(): string {
        return $this->definitionName;
    }

    /**
     * Returns the tax total value adding the tax to the equivalence surcharge.
     *
     * @return float
     */
    public function getValue(): float {
        return $this->reRate + $this->taxRate;
    }

	/**
	 * Returns the tax type.
	 *
	 * @return string
	 */
	public function getType(): string {
		return $this->getEnum(TaxType::class, $this->type, TaxType::LOGICOMMERCE);
	}
}
