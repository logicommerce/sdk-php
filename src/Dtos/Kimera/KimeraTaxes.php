<?php

namespace SDK\Dtos\Kimera;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
/**
 * This is the KimeraDataRequest respnonse class.
 *
 * @see Taxes::getgetIdLanguageId()
 * @see Taxes::getFactor()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos
 */
class KimeraTaxes extends Element {
    use ElementTrait;

    protected int $id = 0;

	protected float $factor = 0.0;

    /**
     * Returns the id.
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Returns the factor.
     *
     * @return float
     */
    public function getFactor(): float {
        return $this->factor;
    }
}