<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the link trait.
 *
 * @see LinkTrait::getLink()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait LinkTrait {

    /**
     * Returns the element value for the href attribute. This will return destinationUrl if filled or urlSeo.
     *
     * @return string
     */
    public function getLink(): string {
        $returnValue = $this->getDestinationUrl();
        if (strlen($returnValue) === 0) {
            $returnValue = $this->getUrlSeo();
        }
        return $returnValue;
    }
}
