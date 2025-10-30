<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document reward point earned class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentRewardPointsRedeemed::getToRedeem()
 * @see RichDocumentRewardPointsRedeemed::getRules()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentRewardPointsRedeemed extends Element{
    use ElementTrait;

    protected int $toRedeem = 0;
    
    protected array $rules = [];

    /**
     * Returns the to redeem.
     *
     * @return int
     */
    public function getToRedeem(): int {
        return $this->toRedeem;
    }

    /**
     * Returns the rules values.
     *
     * @return RichDocumentRewardPointsRedeemedRule[]
     */
    public function getRules(): array {
        return $this->rules;
    }

    protected function setRules(array $rules): void {
        $this->rules = $this->setArrayField($rules, RichDocumentRewardPointsRedeemedRule::class);
    }

}









