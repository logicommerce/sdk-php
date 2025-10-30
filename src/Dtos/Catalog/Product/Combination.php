<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Common\Codes;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the Combination class.
 * The product combinations information of API products will be stored in that class and will remain immutable
 * (only get methods are available)
 *
 * @see Combination::getCodes()
 * @see Combination::getValues()
 * @see Combination::getStocks()
 *
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Catalog\Product
 */
class Combination {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected ?Codes $codes = null;

    protected array $values = [];

    protected array $stocks = [];

    /**
     * Returns the combination codes object.
     *
     * @see Codes
     * @return Codes|NULL
     */
    public function getCodes(): ?Codes {
        return $this->codes;
    }

    protected function setCodes(array $codes): void {
        $this->codes = new Codes($codes);
    }

    /**
     * Returns the values of the combination.
     *
     * @see CombinationValue
     * @return CombinationValue[]
     */
    public function getValues(): array {
        return $this->values;
    }

    protected function setValues(array $values): void {
        $this->values = $this->setArrayField($values, CombinationValue::class);
    }

    /**
     * Returns the stocks of the combination.
     *
     * @see Stock
     * @return Stock[]
     */
    public function getStocks(): array {
        return $this->stocks;
    }

    protected function setStocks(array $stocks): void {
        $this->stocks = $this->setArrayField($stocks, Stock::class);
    }
}
