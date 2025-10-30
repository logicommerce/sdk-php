<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\RewardPointsRuleType;
use SDK\Enums\RewardPointsRuleValueMode;

/**
 * This is the reward points rule class.
 * The API reward points rule will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RewardPointsRule::getLanguage()
 * @see RewardPointsRule::getFrom()
 * @see RewardPointsRule::getTo()
 * @see RewardPointsRule::getValue()
 * @see RewardPointsRule::getType()
 * @see RewardPointsRule::getValueMode()
 * @see RewardPointsRule::getEarned()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class RewardPointsRule {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait;

    protected ?NameDescription $language = null;

    protected float $from = 0;

    protected float $to = 0;

    protected float $value = 0;

    protected string $type = '';

    protected string $valueMode = '';

    protected float $earned = 0;

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
     * Returns the type
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(RewardPointsRuleType::class, $this->type, '');
    }

    /**
     * Returns the ValueMode
     *
     * @return string
     */
    public function getValueMode(): string {
        return $this->getEnum(RewardPointsRuleValueMode::class, $this->valueMode, '');
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
