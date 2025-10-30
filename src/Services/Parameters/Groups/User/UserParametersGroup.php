<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Resources\Date;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;

/**
 * This is the user model (base for main user resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
abstract class UserParametersGroup extends ParametersGroup {

    protected string $pId;

    protected string $nick;

    protected string $gender;

    protected string $birthday;

    protected bool $useShippingAddress;

    protected string $image;

    protected array $customTags;

    protected string $groupPId;

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
     * Sets the nick parameter for this parameters group.
     *
     * @param string $nick
     *
     * @return void
     */
    public function setNick(string $nick): void {
        $this->nick = $nick;
    }

    /**
     * Sets the gender parameter for this parameters group.
     *
     * @param string $gender
     *
     * @return void
     */
    public function setGender(string $gender): void {
        $this->gender = $gender;
    }

    /**
     * Sets the birthday parameter for this parameters group.
     *
     * @param \DateTime $birthday
     *
     * @return void
     */
    public function setBirthday(\DateTime $birthday): void {
        $this->birthday = $birthday->format(Date::DATE_FORMAT);
    }

    /**
     * Sets if the user will use the shipping address for delivery.
     *
     * @param bool $useShippingAddress
     *
     * @return void
     */
    public function setUseShippingAddress(bool $useShippingAddress): void {
        $this->useShippingAddress = $useShippingAddress;
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
     * Sets an array of CustomTags as a parameter for this parameters group.
     *
     * @param UserCustomTagParametersGroup[] $customTags
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
     * Adds a new CustomTag to the array of CustomTags for this parameters group.
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
     * Sets the public group identifier parameter for this parameters group.
     *
     * @param string $groupPId
     *
     * @return void
     */
    public function setGroupPId(string $groupPId): void {
        $this->groupPId = $groupPId;
    }

}
