<?php

declare(strict_types=1);

namespace SDK\Core\Dtos\Filter;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Prices filter class.
 *
 * @see FilterPrices::getMin()
 * @see FilterPrices::getMax()
 *
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos\Filter
 */
class FilterPrices {
    use ElementTrait;

    private float $min = 0.0;

    private float $max = 999999.99;

    /**
     * Returns the prices filter minimum value.
     *
     * @return float
     */
    public function getMin(): float {
        return $this->min;
    }

    private function setMin(float $min): void {
        if ($min < 0) {
            $min = 0.0;
        }
        $min = floor($min * 1000) / 1000;
        $this->min = $min;
    }

    /**
     * Returns the prices filter maximum value.
     *
     * @return float
     */
    public function getMax(): float {
        return $this->max;
    }

    private function setMax(float $max): void {
        if ($max > $this->max) {
            $max = $this->max;
        }
        $max = ceil($max * 1000) / 1000;
        $this->max = $max;
    }
}
