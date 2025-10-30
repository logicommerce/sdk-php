<?php

namespace SDK\Dtos\Documents\Rich;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the rich document user additional class.
 * The document will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see RichDocumentUserAdditional::getSalesAgent()
 * @see RichDocumentUserAdditional::getSalesAgentName()
 * @see RichDocumentUserAdditional::getBlogger()
 * @see RichDocumentUserAdditional::getBloggerName()
 * 
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rich
 */
class RichDocumentUserAdditional extends Element{
    use ElementTrait;

    protected bool $salesAgent = false;

    protected string $salesAgentName = '';

    protected bool $blogger = false;

    protected string $bloggerName = '';

    /**
     * Returns the rich document user additional salesAgent.
     *
     * @return bool
     */
    public function getSalesAgent(): bool {
        return $this->salesAgent;
    }

    /**
     * Returns the rich document user additional salesAgentName.
     *
     * @return string
     */
    public function getSalesAgentName(): string {
        return $this->salesAgentName;
    }

    /**
     * Returns the rich document user additional blogger.
     *
     * @return bool
     */
    public function getBlogger(): bool {
        return $this->blogger;
    }

    /**
     * Returns the rich document user additional bloggerName.
     *
     * @return string
     */
    public function getBloggerName(): string {
        return $this->bloggerName;
    }

}









