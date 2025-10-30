<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the rich document reward point earned rule class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentRewardPointsEarnedRule::getLanguage()
 * @see RichDocumentRewardPointsEarnedRule::getFrom()
 * @see RichDocumentRewardPointsEarnedRule::getTo()
 * @see RichDocumentRewardPointsEarnedRule::getValue()
 * @see RichDocumentRewardPointsEarnedRule::getType()
 * @see RichDocumentRewardPointsEarnedRule::getValueMode()
 * @see RichDocumentRewardPointsEarnedRule::getEarned()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentRewardPointsEarnedRule extends Element{
    use ElementTrait, IdentifiableElementTrait;

    protected ?RichDocumentNameDescription $language = null;

    protected string $from = '';

    protected string $to = '';

    protected float $value = 0;

    protected string $type = '';

    protected string $valueMode = '';

    protected float $earned = 0;

    /**
     * Returns name and description.
     *
     * @return NULL|RichDocumentNameDescription
     */
    public function getLanguage(): ?RichDocumentNameDescription {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new RichDocumentNameDescription($language);
    }

    /**
     * Returns the from value
     *
     * @return string
     */
    public function getFrom(): string {
        return $this->from;
    }

    /**
     * Returns the to value
     *
     * @return string
     */
    public function getTo(): string {
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
     * Returns the type
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Returns the ValueMode
     *
     * @return string
     */
    public function getValueMode(): string {
        return $this->valueMode;
    }

    /**
     * Returns the earned reward points.
     *
     * @return float
     */
    public function getEarned(): float {
        return $this->earned;
    }


}









