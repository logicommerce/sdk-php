<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\RelatedItemsParametersValidator;

/**
 * This is the related items trait parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class RelatedItemsParametersGroup extends ParametersGroup {

    protected string $pId;

    protected int $position;

    protected string $positionList;

    protected int $limit;

    protected int $offset;

    protected bool $categoryProducts;

    protected string $optionsPriceMode;

    /**
     * Sets the public identifier parameter for this parameters group.
     *
     * @param string $pId
     *
     * @return void
     */
    public function setPId(string $pId): void {
        $this->pId = $pId;
    }

    /**
     * Sets the position parameter for this parameters group.
     *
     * @param int $position
     *
     * @return void
     */
    public function setPosition(int $position): void {
        $this->position = $position;
    }

    /**
     * Sets the positionList parameter for this parameters group.
     *
     * @param string $positionList
     *
     * @return void
     */
    public function setPositionList(string $positionList): void {
        $this->positionList = $positionList;
    }

    /**
     * Sets the limit parameter for this parameters group.
     *
     * @param int $limit
     *
     * @return void
     */
    public function setLimit(int $limit): void {
        $this->limit = $limit;
    }

    /**
     * Sets the offset parameter for this parameters group.
     *
     * @param int $offset
     *
     * @return void
     */
    public function setOffset(int $offset): void {
        $this->offset = $offset;
    }

    /**
     * Sets a the prices sort criteria for this parameters group.
     *
     * @param string $optionsPriceMode
     *
     * @return void
     */
    public function setOptionsPriceMode(string $optionsPriceMode): void {
        $this->optionsPriceMode = $optionsPriceMode;
    }

    /**
     * Sets if the products will be filtered using this parameters group in function of if they are inside the related categories.
     * Use that parameter only calling related items for categories
     *
     * @param bool $categoryProducts
     *
     * @return void
     */
    public function setCategoryProducts(bool $categoryProducts): void {
        $this->categoryProducts = $categoryProducts;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): RelatedItemsParametersValidator {
        return new RelatedItemsParametersValidator();
    }
}
