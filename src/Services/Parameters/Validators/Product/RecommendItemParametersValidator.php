<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Validators\Product;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Enums\RecommendItemType;

/**
 * This is the Recommend Item parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators\Product
 */
class RecommendItemParametersValidator extends ParametersValidator {

    protected const REQUIRED_PARAMS = ['id', 'type'];

    protected function validateId($id): ?bool {
        return $this->validatePositiveNumeric($id);
    }

    protected function validateType($type): ?bool {
        $reponse = $this->validateEnumerateValue($type, RecommendItemType::class);
        if ($reponse) {
            if ($type === RecommendItemType::PRODUCT) {
                $reponse = count(static::$params['bundleOptions']) > 0 ? null : true;
            } elseif ($type === RecommendItemType::BUNDLE) {
                $reponse =  count(static::$params['productOptions']) > 0 ? null : true;
            }
        }
        return $reponse;
    }

    protected function validateProductOptions($productOptions): ?bool {
        if (!is_array($productOptions)) {
            return null;
        }
        return true;
    }

    protected function validateBundleOptions($bundleOptions): ?bool {
        if (!is_array($bundleOptions)) {
            return null;
        }
        return true;
    }
}
