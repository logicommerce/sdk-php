<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\PaymentSystemParametersValidator;

/**
 * This is the basket model (set payment system resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class EditPaymentSystemParametersGroup extends ParametersGroup {

    protected int $id;

    protected string $property;

    protected array $additionalData;

    /**
     * Sets the id parameter for this parameters group.
     *
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * Sets the property parameter for this parameters group.
     *
     * @param string $property
     *
     * @return void
     */
    public function setProperty(string $property): void {
        $this->property = $property;
    }

    /**
     * Sets an array of additionalData as a parameter for this parameters group.
     *
     * @param array $additionalData
     *
     * @return void
     */
    public function setAdditionalData(array $additionalData): void {
        $this->additionalData = [];
        foreach ($additionalData as $key => $value) {
            $this->addAdditionalData((string)$key, (string)$value);
        }
    }

    /**
     * Adds new data to the array of additionalData for this parameters group.
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function addAdditionalData(string $key, string $value): void {
        $this->additionalData ??= [];
        $this->additionalData[$key] = $value;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): PaymentSystemParametersValidator {
        return new PaymentSystemParametersValidator();
    }
}
