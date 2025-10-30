<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Resources\Environment;
use SDK\Dtos\Language;

/**
 * This is the language route class.
 * The API language routes will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see LanguageRoute::setUrl()
 * @see LanguageRoute::getUrl()
 *
 * @see Language
 * @see ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class LanguageRoute extends Language {
    use ElementTrait, IdentifiableElementTrait;

    protected string $url = '';

    /**
     * Sets the language route url.
     *
     * @return void
     */
    public function setUrl(string $url): void {
        $this->url = $url;
    }

    /**
     * Returns the language route url.
     *
     * @return string
     */
    public function getUrl(): string {
        $host = Environment::get('COMMERCE_HOST') ?: '';
        $protocol = Environment::get('COMMERCE_PROTOCOL') ?: '';
        $storeUrl = Environment::get('COMMERCE_STORE_URL');
        if (!empty($host) && !empty($protocol) && !empty($storeUrl)) {
            return str_replace($protocol . '://' . $host, $storeUrl, $this->url);
        }
        return $this->url;
    }
}
