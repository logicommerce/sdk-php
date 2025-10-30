<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User\Addresses;

use SDK\Services\Parameters\Groups\BaseUserDataParametersGroup;

/**
 * This is the user model (base for addresses resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User\Addresses
 */
abstract class AddressParametersGroup extends BaseUserDataParametersGroup {

    protected string $alias;

    protected bool $defaultAddress;

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
     * @param bool $defaultAddress
     *
     * @return void
     */
    public function setDefaultAddress(bool $defaultAddress): void {
        $this->defaultAddress = $defaultAddress;
    }
}
