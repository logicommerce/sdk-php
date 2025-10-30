<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\AssetAmbience;
use SDK\Enums\AssetPosition;
use SDK\Enums\AssetScopeType;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the Asset  class.
 * The scripts of the API Assets will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Asset::getCode()
 * @see Asset::getAmbience()
 * @see Asset::getPosition()
 * @see Asset::getType()
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Common
 */
class Asset extends Element {

    use ElementTrait, EnumResolverTrait;

    protected string $path = '';

    protected string $ambience = '';

    protected string $position = '';

    protected string $type = '';

    /**
     * Returns the tracker script path.
     *
     * @return string
     */
    public function getPath(): string {
        return $this->path;
    }

    /**
     * Returns the tracker script ambience.
     *
     * @return string
     */
    public function getAmbience(): string { // ENUM
        return $this->getEnum(AssetAmbience::class, $this->ambience, AssetAmbience::ALL);
    }

    /**
     * Returns the tracker script position.
     *
     * @return string
     */
    public function getPosition(): string { // ENUM
        return $this->getEnum(AssetPosition::class, $this->position, AssetPosition::HEAD_TOP);
    }

    /**
     * Returns the tracker script type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(AssetScopeType::class, $this->type, AssetScopeType::JS);
    }
}
