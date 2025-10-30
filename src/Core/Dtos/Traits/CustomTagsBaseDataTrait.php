<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the custom tag base data trait.
 *
 * @see CustomTagsBaseDataTrait::getGroupPosition()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait CustomTagsBaseDataTrait {
    use CustomTagsDataTrait;

    protected int $groupPosition = 0;

    /**
     * Returns the custom tags group position where this custom tag belongs.
     *
     * @return int
     */
    public function getGroupPosition(): int {
        return $this->groupPosition;
    }
}
