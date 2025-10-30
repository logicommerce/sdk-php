<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\ProductOptionValueParametersValidator;

/**
 * This is the basket model (edit product resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class ProductOptionValueParametersGroup extends ParametersGroup {

    protected string $value;

    protected string $extension;

    protected string $fileName;

    /**
     * Sets the value parameter for this parameters group.
     *
     * @param string $value
     *
     * @return void
     */
    public function setValue(string $value): void {
        $this->value = $value;
    }

    /**
     * Sets the extension parameter for this parameters group.
     *
     * @param string $extension
     *
     * @return void
     */
    public function setExtension(string $extension): void {
        $this->extension = $extension;
    }

    /**
     * Sets the fileName parameter for this parameters group.
     *
     * @param string $fileName
     *
     * @return void
     */
    public function setFileName(string $fileName): void {
        $this->fileName = $fileName;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ProductOptionValueParametersValidator {
        return new ProductOptionValueParametersValidator();
    }
}
