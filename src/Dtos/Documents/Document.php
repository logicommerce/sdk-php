<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Factories\DocumentTaxDefinitionFactory;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the main document class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Document::getChannelId()
 * @see Document::getDocumentNumber()
 * @see Document::getDate()
 * @see Document::getTaxes()
 * @see Document::getHeadquarter()
 * @see Document::getUser()
 * @see Document::getRewardPoints()
 *
 * @see DocumentLanguageElement
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents
 */
abstract class Document extends DocumentLanguageElement {
    use ElementTrait;

    protected int $channelId = 0;

    protected string $documentNumber = '';

    protected ?Date $date = null;

    protected array $taxes = [];

    protected ?DocumentHeadquarter $headquarter = null;

    protected ?DocumentUser $user = null;

    protected array $rewardPoints = [];

    /**
     * Returns internal identifier of the assigned channel.
     *
     * @return int
     */
    public function getChannelId(): int {
        return $this->channelId;
    }

    /**
     * Returns document number with prefix and suffix (if any).
     *
     * @return string
     */
    public function getDocumentNumber(): string {
        return $this->documentNumber;
    }

    /**
     * Returns date the document was created.
     *
     * @return Date|NULL
     */
    public function getDate(): ?Date {
        return $this->date;
    }

    protected function setDate(string $date): void {
        $this->date = Date::create($date);
    }
    
    /**
     * Returns information about the records of taxes applied.
     *
     * @return DocumentTaxDefinitionFactory[]
     */
    public function getTaxes(): array {
        return $this->taxes;
    }

    protected function setTaxes(array $taxes): void {
        $this->taxes = $this->setArrayField($taxes, DocumentTaxDefinitionFactory::class);
    }

    /**
     * Returns information about the headquarter.
     *
     * @return DocumentHeadquarter|NULL
     */
    public function getHeadquarter(): ?DocumentHeadquarter {
        return $this->headquarter;
    }

    protected function setHeadquarter(array $headquarter): void {
        $this->headquarter = new DocumentHeadquarter($headquarter);
    }

    /**
     * Returns information about the user.
     *
     * @return DocumentUser|NULL
     */
    public function getUser(): ?DocumentUser {
        return $this->user;
    }

    protected function setUser(array $user): void {
        $this->user = new DocumentUser($user);
    }

    /**
     * Returns information about the reward points.
     *
     * @return DocumentRewardPoints[]
     */
    public function getRewardPoints(): array {
        return $this->rewardPoints;
    }

    protected function setRewardPoints(array $rewardPoints): void {
        $this->rewardPoints = $this->setArrayField($rewardPoints, DocumentRewardPoints::class);
    }
}
