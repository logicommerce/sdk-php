<?php

namespace SDK\Dtos\Documents;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the pickup point provider class.
 * The pickup point providers information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PickupPointProvider::getLogo()
 * @see PickupPointProvider::getUrl()
 * @see PickupPointProvider::getLanguage()
 * @see PickupPointProvider::getPluginAccountId()
 * @see PickupPointProvider::getPluginAccountModule()
 * 
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see ElementNameTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents
 */

class PickupPointProvider extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, ElementNameTrait;

    protected string $logo = '';

    protected string $url = '';

    protected ?PickupPointProviderLanguage $language = null;

    protected int $pluginAccountId = 0;

    protected string $pluginAccountModule = '';

    /**
     * Returns the logo value.
     *
     * @return string
     */
    public function getLogo(): string {
        return $this->logo;
    }

    /**
     * Returns the url value.
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * Returns the pickup point provider language.
     *
     * @return PickupPointProviderLanguage|NULL
     */
    public function getLanguage(): ?PickupPointProviderLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new PickupPointProviderLanguage($language);
    }

    /**
     * Returns the pluginAccountId value.
     *
     * @return int
     */
    public function getPluginAccountId(): int {
        return $this->pluginAccountId;
    }

    /**
     * Returns the pluginAccountModule value.
     *
     * @return string
     */
    public function getPluginAccountModule(): string {
        return $this->pluginAccountModule;
    }
}
