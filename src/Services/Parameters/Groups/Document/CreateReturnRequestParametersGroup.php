<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Document;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Document\CreateReturnRequestParametersValidator;

/**
 * This is the create return request parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Document
 */
class CreateReturnRequestParametersGroup extends ParametersGroup {

    protected array $items;

    protected string $comment;

    protected CreateReturnRequestDeliveryParametersGroup $delivery;

    /**
     * Sets an array of items as a parameter for this parameters group.
     *
     * @param CreateReturnRequestItemParametersGroup[] $items
     *
     * @return void
     */
    public function setItems(array $items): void {
        $this->items = [];
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    /**
     * Adds a new item to the array of items for this parameters group.
     *
     * @param CreateReturnRequestItemParametersGroup $item
     *
     * @return void
     */
    public function addItem(CreateReturnRequestItemParametersGroup $item): void {
        $this->items ??= [];
        $this->items[] = $item;
    }

    /**
     * Sets the delivery parameter for this parameters group.
     *
     * @param CreateReturnRequestDeliveryParametersGroup $delivery
     *
     * @return void
     */
    public function setDelivery(CreateReturnRequestDeliveryParametersGroup $delivery): void {
        $this->delivery = $delivery;
    }

    /**
     * Sets the comment parameter for this parameters group.
     *
     * @param string $comment
     *
     * @return void
     */
    public function setComment(string $comment): void {
        $this->comment = $comment;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CreateReturnRequestParametersValidator {
        return new CreateReturnRequestParametersValidator();
    }
}
