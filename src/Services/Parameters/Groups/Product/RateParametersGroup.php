<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Product\RateParametersValidator;

/**
 * This is the product model (rate product resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class RateParametersGroup extends ParametersGroup {

    protected int $rating;

    /**
     * Sets the rating parameter for this parameters group.
     *
     * @param int $rating
     *
     * @return void
     */
    public function setRating(int $rating): void {
        $this->rating = $rating;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): RateParametersValidator {
        return new RateParametersValidator();
    }
}
