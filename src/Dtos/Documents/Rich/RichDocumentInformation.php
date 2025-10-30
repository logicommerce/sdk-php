<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document information class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentHeadquarter::getChannelName()
 * @see RichDocumentHeadquarter::getTransactionId()
 * @see RichDocumentHeadquarter::getAuthNumber()
 * @see RichDocumentHeadquarter::getMarketplaceId()
 * @see RichDocumentHeadquarter::getHeadquarterName()
 * 
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentInformation extends Element{
    use ElementTrait;

    protected string $channelName = '';
    
    protected string $transactionId = '';
    
    protected string $authNumber = '';
    
    protected int $marketplaceId = 0;
    
    protected string $headquarterName = '';

    /**
     * Returns the rich document information channelName.
     *
     * @return string
     */
    public function getChannelName(): string {
        return $this->channelName;
    }

    /**
     * Returns the rich document information transactionId.
     *
     * @return string
     */
    public function getTransactionId(): string {
        return $this->transactionId;
    }

    /**
     * Returns the rich document information authNumber.
     *
     * @return string
     */
    public function getAuthNumber(): string {
        return $this->authNumber;
    }

    /**
     * Returns the rich document information marketplaceId.
     *
     * @return int
     */
    public function getMarketplaceId(): int {
        return $this->marketplaceId;
    }

    /**
     * Returns the rich document information headquarterName.
     *
     * @return string
     */
    public function getHeadquarterName(): string {
        return $this->headquarterName;
    }

}
