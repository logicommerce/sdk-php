<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\EditBasketCustomTagsParametersValidator;

/**
 * This is the basket model (edit custom tags) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class EditBasketCustomTagsParametersGroup extends ParametersGroup {

    protected array $customTags;

    /**
     * Sets an array of custom tags as a parameter for this parameters group.
     *
     * @param EditBasketCustomTagParametersGroup[] $customTags
     *
     * @return void
     */
    public function setCustomTags(array $customTags): void {
        $this->customTags = [];
        foreach ($customTags as $customTag) {
            $this->addCustomTag($customTag);
        }
    }

    /**
     * Adds a new custom tag to the array of custom tags for this parameters group.
     *
     * @param EditBasketCustomTagParametersGroup $customTag
     *
     * @return void
     */
    public function addCustomTag(EditBasketCustomTagParametersGroup $customTag): void {
        $this->customTags ??= [];
        $this->customTags[] = $customTag;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): EditBasketCustomTagsParametersValidator {
        return new EditBasketCustomTagsParametersValidator();
    }
}
