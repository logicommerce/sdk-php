<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document reward point earned class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentRewardPointsEarned::getRules()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentRewardPointsEarned extends Element{
    use ElementTrait;

    protected array $rules = [];

    /**
     * Returns the rules values.
     *
     * @return RichDocumentRewardPointsEarnedRule[]
     */
    public function getRules(): array {
        return $this->rules;
    }

    protected function setRules(array $rules): void {
        $this->rules = $this->setArrayField($rules, RichDocumentRewardPointsEarnedRule::class);
    }

}









