<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the reward points rule class.
 * The API reward points rule will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RewardPointsBalance::getLanguage()
 * @see RewardPointsBalance::getAvailables()
 * @see RewardPointsBalance::getEarned()
 * @see RewardPointsBalance::getRedeemed()
 * @see RewardPointsBalance::getPending()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses IdentifiableElementTrait
 * @uses IntegrableElementTrait
 *
 * @package SDK\Dtos\Common
 */
class RewardPointsBalance extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected ?NameDescription $language = null;

    protected array $availables = [];

    protected int $earned = 0;

    protected int $redeemed = 0;

    protected int $pending = 0;

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
     * Returns the balance available.
     *
     * @return RewardPointsBalanceAvailable[]
     */
    public function getAvailables(): array {
        return $this->availables;
    }

    protected function setAvailables(array $availables): void {
        $this->availables = $this->setArrayField($availables, RewardPointsBalanceAvailable::class);
    }

    /**
     * Returns the earned value
     *
     * @return int
     */
    public function getEarned(): int {
        return $this->earned;
    }

    /**
     * Returns the redeemed value
     *
     * @return int
     */
    public function getRedeemed(): int {
        return $this->redeemed;
    }

    /**
     * Returns the pending value
     *
     * @return int
     */
    public function getPending(): int {
        return $this->pending;
    }

}
