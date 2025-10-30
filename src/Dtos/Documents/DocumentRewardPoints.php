<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Resources\Date;
use SDK\Dtos\Common\Earned;
use SDK\Dtos\Common\NameDescription;
use SDK\Dtos\Common\Redeemed;
use SDK\Dtos\Common\RewardPointsSummary;
use SDK\Enums\RewardPointsExpirationType;

/**
 * This is the document reward points class.
 * The document reward points of API items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DocumentRewardPoints::getLanguage()
 * @see DocumentRewardPoints::getExpirationType()
 * @see DocumentRewardPoints::getExpirationDate()
 * @see DocumentRewardPoints::getExpirationDays()
 * @see DocumentRewardPoints::getEarned()
 * @see DocumentRewardPoints::getRedeemed()
 * @see DocumentRewardPoints::getSummary()
 *
 * @see Element
 * @see ElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Catalog\Document
 */
class DocumentRewardPoints extends Element {
    use ElementTrait, IntegrableElementTrait, EnumResolverTrait;

    protected ?NameDescription $language = null;

    protected string $expirationType = '';

    protected ?Date $expirationDate = null;

    protected int $expirationDays = 0;

    protected ?Earned $earned = null;

    protected ?Redeemed $redeemed = null;

    protected ?RewardPointsSummary $summary = null;

    protected int $rewardPointsId = 0;

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
     * Returns the expiration type
     *
     * @return string
     */
    public function getExpirationType(): string {
        return $this->getEnum(RewardPointsExpirationType::class, $this->expirationType, '');
    }

    /**
     * Returns the expiration Date value.
     *
     * @return Date|NULL
     */
    public function getExpirationDate(): ?Date {
        return $this->expirationDate;
    }

    protected function setExpirationDate(string $expirationDate): void {
        $this->expirationDate = Date::create($expirationDate);
    }

    /**
     * Returns the expiration Days
     *
     * @return int
     */
    public function getExpirationDays(): int {
        return $this->expirationDays;
    }

    /**
     * Returns earned
     *
     * @return NULL|earned
     */
    public function getEarned(): ?Earned {
        return $this->earned;
    }

    protected function setEarned(array $earned): void {
        $this->earned = new Earned($earned);
    }

    /**
     * Returns redeemed
     *
     * @return NULL|Redeemed
     */
    public function getRedeemed(): ?Redeemed {
        return $this->redeemed;
    }

    protected function setRedeemed(array $redeemed): void {
        $this->redeemed = new Redeemed($redeemed);
    }

    /**
     * Returns summary
     *
     * @return NULL|RewardPointsSummary
     */
    public function getSummary(): ?RewardPointsSummary {
        return $this->summary;
    }

    protected function setSummary(array $summary): void {
        $this->summary = new RewardPointsSummary($summary);
    }

    /**
     * Returns the reward points id
     *
     * @return int
     */
    public function getRewardPointsId(): int {
        return $this->rewardPointsId;
    }
}
