<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the document item tax class.
 * The document item taxes will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentItemTax::getTaxId()
 * @see DocumentItemTax::getDefinitionName()
 * @see DocumentItemTax::getTaxRate()
 * @see DocumentItemTax::getReRate()
 * @see DocumentItemTax::getPriority()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Documents
 */
class DocumentItemTax extends Element {
    use ElementTrait, ElementNameTrait;

    protected int $taxId = 0;

    protected string $definitionName = '';

    protected float $taxRate = 0.0;

    protected float $reRate = 0.0;

    protected int $priority = 0;

    /**
     * Returns the document item tax internal identifier.
     *
     * @return int
     */
    public function getTaxId(): int {
        return $this->taxId;
    }

    /**
     * Returns the document item tax definition name.
     *
     * @return string
     */
    public function getDefinitionName(): string {
        return $this->definitionName;
    }

    /**
     * Returns the document item tax rate.
     *
     * @return float
     */
    public function getTaxRate(): float {
        return $this->taxRate;
    }

    /**
     * Returns the document item tax re rate.
     *
     * @return float
     */
    public function getReRate(): float {
        return $this->reRate;
    }

    /**
     * Returns the document item tax priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }
}
