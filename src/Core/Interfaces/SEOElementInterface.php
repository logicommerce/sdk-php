<?php declare(strict_types=1);

namespace SDK\Core\Interfaces;

/**
 * This is the SEOElement interface
 *
 * @see SEOElementInterface::getTitle()
 * @see SEOElementInterface::getMetaDescription()
 * @see SEOElementInterface::getKeywords()
 *
 * @see Request
 *
 * @package SDK\Core\Interfaces
 */
interface SEOElementInterface {

    public function getTitle(): string;

    public function getMetaDescription(): string;

    public function getKeywords(): string;
}
