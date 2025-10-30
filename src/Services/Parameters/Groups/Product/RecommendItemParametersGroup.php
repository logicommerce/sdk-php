<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Groups\Basket\BundleItemParametersGroup;
use SDK\Services\Parameters\Groups\Basket\ProductOptionParametersGroup;
use SDK\Services\Parameters\Validators\Product\RecommendItemParametersValidator;

/**
 * This is the item model (recommend resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class RecommendItemParametersGroup extends ParametersGroup {

    protected string $type;

    protected int $id;

    protected array $productOptions = [];

    protected array $bundleOptions = [];

    /**
     * Specifies the reference type.
     *
     * @param string $type
     *
     * @return void
     */
    public function setType(string $type): void {
        $this->type = $type;
    }

    /**
     * Specifies the internal identifier of the referenced item.
     *
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * Parameter block to set the required product options. The 'option-value' pairs sent for this parameter must match the options you want to set for the product. If an empty array is specified then it will be left with no options set. Only applicable for Product references.
     *
     * @param ProductOptionParametersGroup ParametersGroup[] $options
     *
     * @return void
     */
    public function setProductOptions(array $productOptions): void {
        $this->productOptions = [];
        foreach ($productOptions as $productOption) {
            $this->addProductOption($productOption);
        }
    }

    /**
     * Parameter block to add the required product option. The 'option-value' pairs sent for this parameter must match the options you want to set for the product. If an empty array is specified then it will be left with no options set. Only applicable for Product references.
     *
     * @param ProductOptionParametersGroup $option
     *
     * @return void
     */
    public function addProductOption(ProductOptionParametersGroup $productOption): void {
        $this->productOptions ??= [];
        $this->productOptions[] = $productOption;
    }

    /**
     * Parameter block to set the required options of the bundle's items. For each pack's item you want to set options, you need to specify the identifier of the pack's item and as many 'option-value' pairs as options you want to set for that item of the pack. If an empty array is specified then it will be left with no options set. Only applicable for Bundle references.
     *
     * @param BundleItemParametersGroup[] $options
     *
     * @return void
     */
    public function setBundleOptions(array $bundleOptions): void {
        $this->bundleOptions = [];
        foreach ($bundleOptions as $bundleOption) {
            $this->addBundleOption($bundleOption);
        }
    }

    /**
     * Parameter block to add the required options of the bundle's items. For each pack's item you want to set options, you need to specify the identifier of the pack's item and as many 'option-value' pairs as options you want to set for that item of the pack. If an empty array is specified then it will be left with no options set. Only applicable for Bundle references.
     *
     * @param BundleItemParametersGroup $option
     *
     * @return void
     */
    public function addBundleOption(BundleItemParametersGroup $bundleOption): void {
        $this->bundleOptions ??= [];
        $this->bundleOptions[] = $bundleOption;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): RecommendItemParametersValidator {
        return new RecommendItemParametersValidator();
    }
}
