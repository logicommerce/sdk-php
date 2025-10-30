<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the url SEO trait.
 *
 * @see ElementUrlSeoTrait::getUrlSeo()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ElementUrlSeoTrait {

    protected string $urlSeo = '';

    /**
     * Returns the element SEO URL for the website current language.
     *
     * @return string
     */
    public function getUrlSeo(): string {
        return $this->urlSeo;
    }
}
