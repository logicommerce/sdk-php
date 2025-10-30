<?php

namespace SDK\Dtos\Catalog\Page;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\CustomTagValuesTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Dtos\Factories\PageFactory;
use SDK\Enums\PageType;

/**
 * This is the Page class.
 * The information of API pages will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Page::getCustomType()
 * @see Page::getItemId()
 * @see Page::getLanguage()
 * @see Page::getPagesGroupId()
 * @see Page::getPageType()
 * @see Page::getParentPageId()
 * @see Page::getPosition()
 * @see Page::getPriority()
 * @see Page::getActive()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see CustomTagValuesTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Catalog\Page
 */
class Page extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, CustomTagValuesTrait, EnumResolverTrait;

    protected int $priority = 0;

    protected int $position = 0;

    protected int $pagesGroupId = 0;

    protected int $parentPageId = 0;

    protected string $pageType = '';

    protected int $itemId = 0;

    protected string $customType = '';

    protected ?PageLanguage $language = null;

    protected bool $active = false;

    protected array $subpages = [];

    /**
     * Returns the page priority.
     *
     * @return int
     */
    public function getPriority(): int {
        return $this->priority;
    }

    /**
     * Returns the page position.
     *
     * @return int
     */
    public function getPosition(): int {
        return $this->position;
    }

    /**
     * Returns the pages group id where this page belongs.
     *
     * @return int
     */
    public function getPagesGroupId(): int {
        return $this->pagesGroupId;
    }

    /**
     * Returns the parent page id.
     *
     * @return int
     */
    public function getParentPageId(): int {
        return $this->parentPageId;
    }

    /**
     * Returns the page type.
     *
     * @return string
     */
    public function getPageType(): string { // ENUM
        return $this->getEnum(PageType::class, $this->pageType, PageType::DEFAULT);
    }

    /**
     * Returns the page item id.
     * Only filled if pageType require this to work properly.
     *
     * @return int
     */
    public function getItemId(): int {
        return $this->itemId;
    }

    /**
     * Returns the page custom type.
     * Only filled if pageType require this to work properly.
     *
     * @return string
     */
    public function getCustomType(): string {
        return $this->customType;
    }

    /**
     * Returns the page language object.
     *
     * @see PageLanguage
     * @return PageLanguage|NULL
     */
    public function getLanguage(): ?PageLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new PageLanguage($language);
    }

    /**
     * Sets if the page is active or not.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Returns the subpages of this page.
     *
     * @return Page[]
     */
    public function getSubpages(): array {
        return $this->subpages;
    }

    protected function setSubpages(array $subpages): void {
        $this->subpages = $this->setArrayField($subpages, PageFactory::class);
    }

    /**
     * Returns the particular content of the page type.
     * For main type (Page) it always will return null
     *
     * @return null
     */
    public function getAdditionalData() {
        return null;
    }
}
