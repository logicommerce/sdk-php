<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\SendWishlistParametersValidator;

/**
 * This is the user model (send wishlist resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 * 
 * @deprecated
 */
class SendWishlistParametersGroup extends ParametersGroup {

    protected string $productIdList;

    protected string $toName;

    protected string $toEmail;

    protected string $comment;

    /**
     * Sets a list of products internal identifiers for this parameters group.
     *
     * @param string $productIdList
     *
     * @return void
     */
    public function setProductIdList(string $productIdList): void {
        $this->productIdList = $productIdList;
    }

    /**
     * Sets the receiver name parameter for this parameters group.
     *
     * @param string $name
     *
     * @return void
     */
    public function setToName(string $toName): void {
        $this->toName = $toName;
    }

    /**
     * Sets the receiver email parameter for this parameters group.
     *
     * @param string $name
     *
     * @return void
     */
    public function setToEmail(string $toEmail): void {
        $this->toEmail = $toEmail;
    }

    /**
     * Sets the comment parameter for this parameters group.
     *
     * @param string $name
     *
     * @return void
     */
    public function setComment(string $comment): void {
        $this->comment = $comment;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): SendWishlistParametersValidator {
        return new SendWishlistParametersValidator();
    }
}
