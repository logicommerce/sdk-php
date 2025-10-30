<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Version class.
 * The Version will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Version::getVersion()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class Version extends Element {
    use ElementTrait;

    protected string $version = '';

    /**
     * API version.
     *
     * @return string
     */
    public function getVersion(): string {
        return $this->version;
    }

    protected function setVersion(string $version): void {
        $this->version = $version;
    }
}
