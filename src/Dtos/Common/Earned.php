<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Common\RewardPointsRule;

/**
 * This is the Earned class.
 * The Earned of API items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Earned::getRules()
 *
 * @see ElementTrait
 * 
 *
 * @package SDK\Dtos\Catalog\Product
 */
class Earned {
    use ElementTrait;

    protected array $rules = [];

    /**
     * Returns the rules values.
     *
     * @return RewardPointsRule[]
     */
    public function getRules(): array {
        return $this->rules;
    }

    protected function setRules(array $rules): void {
        $this->rules = $this->setArrayField($rules, RewardPointsRule::class);
    }

}
