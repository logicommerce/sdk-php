<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the reward points redeemed rule class.
 * The API reward points rule will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RewardPointsRedeemedRule::getLanguage()
 * @see RewardPointsRedeemedRule::getFrom()
 * @see RewardPointsRedeemedRule::getTo()
 * @see RewardPointsRedeemedRule::getValue()
 * @see RewardPointsRedeemedRule::getredeemed()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class RewardPointsRedeemedRule extends Element {
    use ElementTrait, IdentifiableElementTrait;

    protected ?NameDescription $language = null;

    protected float $from = 0;

    protected float $to = 0;

    protected float $value = 0;

    protected string $type = '';

    protected int $redeemed = 0;

    /**
     * Returns name and description.
     *
     * @return NULL|NameDescription
     */
    public function getLanguage(): ?NameDescription {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new NameDescription($language);
    }

    /**
     * Returns the from value
     *
     * @return float
     */
    public function getFrom(): float {
        return $this->from;
    }

    /**
     * Returns the to value
     *
     * @return float
     */
    public function getTo(): float {
        return $this->to;
    }

    /**
     * Returns the value
     *
     * @return float
     */
    public function getValue(): float {
        return $this->value;
    }

    /**
     * Returns the redeemed reward points.
     *
     * @return float
     */
    public function getRedeemed(): float {
        return $this->redeemed;
    }

}
