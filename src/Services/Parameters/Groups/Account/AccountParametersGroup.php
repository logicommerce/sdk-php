<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Groups\User\UserCustomTagParametersGroup;

/**
 * This is the account parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
abstract class AccountParametersGroup extends ParametersGroup {

    protected array $customTags;

    protected string $pId;

    protected string $image;

    protected string $email;

    /**
     * Sets the custom tags parameter for this parameters group.
     * 
     * @param array $customTags
     * 
     * @return void
     */
    public function setCustomTags(array $customTags): void {
        $this->customTags = [];
        foreach ($customTags as $tag) {
            $this->addCustomTag($tag);
        }
    }

    /**
     * Adds a new custom tag to the array of custom tags for this parameters group.
     * 
     * @param UserCustomTagParametersGroup $customTag
     * 
     * @return void
     */
    public function addCustomTag(UserCustomTagParametersGroup $customTag): void {
        $this->customTags ??= [];
        $this->customTags[] = $customTag;
    }

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
     * Sets the image parameter for this parameters group.
     * 
     * @param string $image
     * 
     * @return void
     */
    public function setImage(string $image): void {
        $this->image = $image;
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
}
