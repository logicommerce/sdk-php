<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Factories\AppliedTaxFactory;
use SDK\Enums\PickingDeliveryType;

/**
 * This is the delivery class.
 * The basket delivery information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketPickingDelivery::getPrice()
 * @see BasketPickingDelivery::getPriceWithTaxes()
 * @see BasketPickingDelivery::getAppliedTaxes()
 * @see BasketPickingDelivery::getMode()
 * @see BasketPickingDelivery::getPhysicalLocation()
 *
 * @see BasketDelivery
 *
 * @package SDK\Dtos\Basket
 */
class BasketPickingDelivery extends BasketDelivery {

    protected float $price = 0.0;

    protected float $priceWithTaxes = 0.0;

    protected array $appliedTaxes = [];

    protected ?PickingDeliveryMode $mode = null;

    /**
     * Returns the shipping prices
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Returns the shipping price With Taxes
     *
     * @return float
     */
    public function getPriceWithTaxes(): float {
        return $this->priceWithTaxes;
    }

    /**
     * Returns the shipping applied taxes.
     *
     * @return AppliedTax[]
     */
    public function getAppliedTaxes(): array {
        return $this->appliedTaxes;
    }

    protected function setAppliedTaxes(array $appliedTaxes): void {
        $this->appliedTaxes = $this->setArrayField($appliedTaxes, AppliedTaxFactory::class);
    }

    /**
     * Returns the mode
     *
     * @return null|PickingDeliveryMode
     */
    public function getMode(): ?PickingDeliveryMode {
        return $this->mode;
    }

    protected function setMode($mode) {
        if (isset($mode['type'])) {
            if ($mode['type'] == PickingDeliveryType::PROVIDER_PICKUP_POINT) {
                $this->mode = new ProviderPickupPointPickingDelivery($mode);
            } elseif ($mode['type'] == PickingDeliveryType::PICKUP_POINT_PHYSICAL_LOCATION) {
                $this->mode = new PhysicalLocationPickingDelivery($mode);
            }
        }
    }
}
