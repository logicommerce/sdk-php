<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\ThemeTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Dtos\Snippets\BreadcrumbRichSnippets;
use SDK\Enums\RouteType;

/**
 * This is the Route class.
 * The API Routes will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Route::getType()
 * @see Route::getStatus()
 * @see Route::getLanguage()
 * @see Route::getCountry()
 * @see Route::getCurrency()
 * @see Route::getRedirectUrl()
 * @see Route::getCanonical()
 * @see Route::getAvailableLanguages()
 * @see Route::getWarning()
 * @see Route::getWarningGeoIp()
 * @see Route::getBreadcrumb()
 * @see Route::getBreadcrumbRichSnippet()
 * @see Route::getCacheControl()
 * @see Route::getAlternates()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see ThemeTrait
 *
 * @package SDK\Dtos\Common
 */
class Route extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait, ThemeTrait;

    protected string $type = '';

    protected int $status = 0;

    protected string $language = '';

    protected string $country = '';

    protected string $currency = '';

    protected string $redirectUrl = '';

    protected string $canonical = '';

    protected array $availableLanguages = [];

    protected ?RouteWarning $warning = null;

    protected string $warningGeoIp = '';

    protected array $breadcrumb = [];

    protected ?BreadcrumbRichSnippets $breadcrumbRichSnippet = null;

    protected ?CacheControl $cacheControl = null;

    protected array $alternates = [];

    protected ?RouteMetadata $metadata = null;

    protected string $urlPrefix = '';

    /**
     * Returns the route type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(RouteType::class, $this->type, RouteType::NOT_FOUND);
    }

    /**
     * Returns the route status.
     *
     * @return int
     */
    public function getStatus(): int {
        return $this->status;
    }

    /**
     * Returns the route language.
     *
     * @return string
     */
    public function getLanguage(): string {
        return $this->language;
    }

    /**
     * Returns the route country.
     *
     * @return string
     */
    public function getCountry(): string {
        return $this->country;
    }

    /**
     * Returns the route currency.
     *
     * @return string
     */
    public function getCurrency(): string {
        return $this->currency;
    }

    /**
     * Returns the route redirect URL.
     *
     * @return string
     */
    public function getRedirectUrl(): string {
        return $this->redirectUrl;
    }

    /**
     * Returns the route canonical.
     *
     * @return string
     */
    public function getCanonical(): string {
        return $this->canonical;
    }

    /**
     * Returns the route available languages.
     *
     * @return LanguageRoute[]
     */
    public function getAvailableLanguages(): array {
        return $this->availableLanguages;
    }

    protected function setAvailableLanguages(array $availableLanguages): void {
        $this->availableLanguages = $this->setArrayField($availableLanguages, LanguageRoute::class);
    }

    /**
     * Returns the route warning.
     *
     * @return RouteWarning|NULL
     */
    public function getWarning(): ?RouteWarning {
        return $this->warning;
    }

    protected function setWarning(array $warning): void {
        $this->warning = new RouteWarning($warning);
    }

    /**
     * Returns the route warningGeoIp.
     *
     * @return string
     */
    public function getWarningGeoIp(): string {
        return $this->warningGeoIp;
    }

    /**
     * Returns the route breadcrumb.
     *
     * @return Breadcrumb[]
     */
    public function getBreadcrumb(): array {
        return $this->breadcrumb;
    }

    protected function setBreadcrumb(array $breadcrumb): void {
        $this->breadcrumb = $this->setArrayField($breadcrumb, Breadcrumb::class);
    }

    /**
     * Returns the rich snippets for the route breadcrumb.
     *
     * @return BreadcrumbRichSnippets|NULL
     */
    public function getBreadcrumbRichSnippet(): ?BreadcrumbRichSnippets {
        return $this->breadcrumbRichSnippet;
    }

    protected function setBreadcrumbRichSnippet(array $breadcrumbRichSnippet): void {
        $this->breadcrumbRichSnippet = new BreadcrumbRichSnippets($breadcrumbRichSnippet);
    }

    /**
     * Returns the route cacheControl.
     *
     * @return CacheControl|NULL
     */
    public function getCacheControl(): ?CacheControl {
        return $this->cacheControl;
    }

    protected function setCacheControl(array $cacheControl): void {
        $this->cacheControl = new CacheControl($cacheControl);
    }

    /**
     * Returns the route alternates.
     *
     * @return Alternate[]
     */
    public function getAlternates(): array {
        return $this->alternates;
    }

    protected function setAlternates(array $alternates): void {
        $this->alternates = $this->setArrayField($alternates, Alternate::class);
    }

    /**
     * Returns the metadata object.
     *
     * @see RouteMetadata
     * @return RouteMetadata|NULL
     */
    public function getMetadata(): ?RouteMetadata {
        return $this->metadata;
    }

    protected function setMetadata(array $metadata): void {
        $this->metadata = new RouteMetadata($metadata);
    }

    /**
     * Returns the route url prefix.
     *
     * @return string
     */
    public function getUrlPrefix(): string {
        return $this->urlPrefix;
    }
}
