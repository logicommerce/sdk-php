<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Enums\CustomTagControlType;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the custom tag data trait.
 *
 * @see CustomTagsDataTrait::getControlType()
 * @see CustomTagsDataTrait::getPosition()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait CustomTagsDataTrait {
    use EnumResolverTrait;

    protected string $controlType = '';

    /**
     * Returns the custom tag control type.
     *
     * @return string
     */
    public function getControlType(): string { // ENUM
        return $this->getEnum(CustomTagControlType::class, $this->controlType, CustomTagControlType::SHORT_TEXT);
    }
}
