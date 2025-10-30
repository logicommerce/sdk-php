<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Dtos\CustomTagValue;

/**
 * This is the custom tag values trait.
 *
 * @see CustomTagValuesTrait::getCustomTagValues()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait CustomTagValuesTrait {

    protected array $customTagValues = [];

    /**
     * Returns the element custom tag values.
     *
     * @return CustomTagValue[]
     */
    public function getCustomTagValues(): array {
        return $this->customTagValues;
    }

    protected function setCustomTagValues(array $customTagValues): void {
        $this->customTagValues = $this->setArrayField($customTagValues, CustomTagValue::class);
    }
}
