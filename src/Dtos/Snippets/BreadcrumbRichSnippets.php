<?php

namespace SDK\Dtos\Snippets;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the breadcrumb rich snippets class.
 * The breadcrumb rich snippets will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BreadcrumbRichSnippets::getItemListElement()
 *
 * @see RichSnippets
 * @see ElementTrait
 *
 * @package SDK\Dtos\Snippets
 */
class BreadcrumbRichSnippets extends RichSnippets {
    use ElementTrait;

    protected array $itemListElement = [];

    /**
     * Returns a list with the items forming the breadcrumb rich snippet.
     *
     * @return ListItem[]
     */
    public function getItemListElement(): array {
        return $this->itemListElement;
    }

    protected function setItemListElement(array $itemListElement): void {
        $this->itemListElement = $this->setArrayField($itemListElement, ListItem::class);
    }
}
