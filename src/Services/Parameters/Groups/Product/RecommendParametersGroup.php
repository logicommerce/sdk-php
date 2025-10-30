<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Product\RecommendParametersValidator;

/**
 * This is the recommend resource parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class RecommendParametersGroup extends ParametersGroup {

    protected string $name;

    protected string $email;

    protected string $toName;

    protected string $toEmail;

    protected string $comment;

    protected array $items = [];

    protected int $shoppingListId;

    protected string $optionsPriceMode;

    /**
     * Sets the name parameter for this parameters group.
     *
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * Sets the email parameter for this parameters group.
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * Sets the receiver name parameter for this parameters group.
     *
     * @param string $toName
     *
     * @return void
     */
    public function setToName(string $toName): void {
        $this->toName = $toName;
    }

    /**
     * Sets the receiver email parameter for this parameters group.
     *
     * @param string $toEmail
     *
     * @return void
     */
    public function setToEmail(string $toEmail): void {
        $this->toEmail = $toEmail;
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
     * Set the items parameter for this parameters group.
     *
     * @param RecommendItemParametersGroup[] $options
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
     * Adds an item to the items parameter for this parameters group.
     *
     * @param RecommendItemParametersGroup $option
     *
     * @return void
     */
    public function addItem(RecommendItemParametersGroup $item): void {
        $this->items ??= [];
        $this->items[] = $item;
    }

    /**
     * Sets the shoppingListId parameter for this parameters group.
     *
     * @param int $shoppingListId
     *
     * @return void
     */
    public function setShoppingListId(int $shoppingListId): void {
        $this->shoppingListId = $shoppingListId;
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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): RecommendParametersValidator {
        return new RecommendParametersValidator();
    }
}
