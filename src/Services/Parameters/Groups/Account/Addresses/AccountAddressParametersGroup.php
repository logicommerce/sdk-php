<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account\Addresses;

use SDK\Services\Parameters\Groups\BaseUserDataParametersGroup;

/**
 * This is the account model (base for addresses resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account\Addresses
 */
abstract class AccountAddressParametersGroup extends BaseUserDataParametersGroup {

    protected string $alias;

    protected bool $defaultOne;

    protected string $pId;

    /**
     * Sets the alias parameter for this parameters group.
     *
     * @param string $alias
     *
     * @return void
     */
    public function setAlias(string $alias): void {
        $this->alias = $alias;
    }

    /**
     * Sets if the addresses will be filtered using this parameters group in function of if they are the default address.
     *
     * @param bool $defaultOne
     *
     * @return void
     */
    public function setDefaultOne(bool $defaultOne): void {
        $this->defaultOne = $defaultOne;
    }

    /**
     * Sets the pId parameter for this parameters group.
     *
     * @param string $pId
     *
     * @return void
     */
    public function setPId(string $pId): void {
        $this->pId = $pId;
    }
}
