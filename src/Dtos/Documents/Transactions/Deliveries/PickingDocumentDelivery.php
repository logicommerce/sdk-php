<?php

namespace SDK\Dtos\Documents\Transactions\Deliveries;

use SDK\Core\Dtos\Factories\DocumentAppliedTaxFactory;
use SDK\Enums\PickingDeliveryType;

/**
 * This is the picking document delivery class.
 * The document delivery will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ShippingDocumentDelivery::getPhysicalLocation()
 * 
 * @see DocumentDelivery
 *
 * @package SDK\Dtos\Documents\Transactions\Deliveries
 */
class PickingDocumentDelivery extends DocumentDelivery {

    protected float $price = 0.0;

    protected float $priceWithTaxes = 0.0;

    protected array $taxes = [];

    protected ?PickingDeliveryMode $mode = null;

    /**
     * Returns the shipping prices price.
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Returns the shipping prices priceWithTaxes.
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
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, DocumentAppliedTaxFactory::class);
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
