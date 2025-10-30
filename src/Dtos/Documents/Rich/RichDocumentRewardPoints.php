<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;

/**
 * This is the rich document reward point class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentRewardPoints::getExpirationType()
 * @see RichDocumentRewardPoints::getExpirationDate()
 * @see RichDocumentRewardPoints::getExpirationDays()
 * @see RichDocumentRewardPoints::getEarned()
 * @see RichDocumentRewardPoints::getRedeemed()
 * @see RichDocumentRewardPoints::getSummary()
 * @see RichDocumentRewardPoints::getPId()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * @uses EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentRewardPoints extends Element{
    use ElementTrait, IdentifiableElementTrait;

    protected string $expirationType = '';

    protected string $expirationDate = '';

    protected string $expirationDays = '';

    protected ?RichDocumentRewardPointsEarned $earned = null;

    protected ?RichDocumentRewardPointsRedeemed $redeemed = null;

    protected ?RichDocumentRewardPointsSummary $summary = null;

    protected string $pId = '';

    /**
     * Returns the rich document reward point expirationType.
     *
     * @return string
     */
    public function getExpirationType(): string {
        return $this->expirationType;
    }

    /**
     * Returns the rich document reward point expirationDate.
     *
     * @return string
     */
    public function getExpirationDate(): string {
        return $this->expirationDate;
    }

    /**
     * Returns the rich document reward point expirationDays.
     *
     * @return string
     */
    public function getExpirationDays(): string {
        return $this->expirationDays;
    }

    /**
     * Returns the rich document reward point earned.
     *
     * @return RichDocumentRewardPointsEarned|NULL
     */
    public function getEarned(): ?RichDocumentRewardPointsEarned {
        return $this->earned;
    }

    protected function setEarned(array $earned): void {
        $this->earned = new RichDocumentRewardPointsEarned($earned);
    }

    /**
     * Returns the rich document reward point redeemed.
     *
     * @return RichDocumentRewardPointsRedeemed|NULL
     */
    public function getRedeemed(): ?RichDocumentRewardPointsRedeemed {
        return $this->redeemed;
    }

    protected function setRedeemed(array $redeemed): void {
        $this->redeemed = new RichDocumentRewardPointsRedeemed($redeemed);
    }

    /**
     * Returns the rich document reward point summary.
     *
     * @return RichDocumentRewardPointsSummary|NULL
     */
    public function getSummary(): ?RichDocumentRewardPointsSummary {
        return $this->summary;
    }

    protected function setSummary(array $summary): void {
        $this->summary = new RichDocumentRewardPointsSummary($summary);
    }

    /**
     * Returns the rich document reward point pId.
     *
     * @return string
     */
    public function getPId(): string {
        return $this->pId;
    }

}









