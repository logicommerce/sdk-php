<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\RouteType;

/**
 * This is the Breadcrumb class.
 * The API Breadcrumbs will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Breadcrumb::getItemType()
 * @see Breadcrumb::getItemId()
 * @see Breadcrumb::getUrlSeo()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Common
 */
class Breadcrumb {
    use ElementTrait, ElementNameTrait, EnumResolverTrait;

    protected string $itemType = '';

    protected int $itemId = 0;

    protected string $urlSeo = '';

    /**
     * Returns the breadcrumb item type.
     *
     * @return string
     */
    public function getItemType(): string { // ENUM
        return $this->getEnum(RouteType::class, $this->itemType, RouteType::NOT_FOUND);
    }

    /**
     * Returns the breadcrumb item internal identifier.
     *
     * @return int
     */
    public function getItemId(): int {
        return $this->itemId;
    }

    /**
     * Returns the Breadcrumb urlSeo.
     *
     * @return string
     */
    public function getUrlSeo(): string {
        return $this->urlSeo;
    }
}
