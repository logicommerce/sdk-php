<?php

namespace SDK\Dtos\User;

use SDK\Core\Resources\Date;
use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\CustomTagValuesTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Dtos\Traits\DateAddedTrait;
use SDK\Core\Dtos\Traits\SalesAgentTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\AccountAddressType;
use SDK\Enums\AddressType;
use SDK\Enums\Gender;

/**
 * This is the user main class.
 * The user information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see User::getEmail()
 * @see User::getNick()
 * @see User::getGender()
 * @see User::getUserGroups()
 * @see User::getUniqueId()
 * @see User::getBirthday()
 * @see User::getLastUsed()
 * @see User::getLanguageCode()
 * @see User::getCurrencyCode()
 * @see User::getUseShippingAddress()
 * @see User::getVerified()
 * @see User::getBlogVerified()
 * @see User::getActive()
 * @see User::getImage()
 * @see User::getSupplier()
 * @see User::getBlogger()
 * @see User::getParentId()
 * @see User::getBillingAddresses()
 * @see User::getDefaultBillingAddress()
 * @see User::getShippingAddresses()
 * @see User::getDefaultShippingAddress()
 * @see User::getAddress()
 * @see User::getSelectedBillingAddressId()
 * @see User::getSelectedShippingAddressId()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see DateAddedTrait
 * @see CustomTagValuesTrait
 * @see EnumResolverTrait
 * @see SalesAgentTrait
 *
 * @package SDK\Dtos\User
 */
class User extends Element {
    use IdentifiableElementTrait, IntegrableElementTrait, DateAddedTrait, CustomTagValuesTrait, EnumResolverTrait, SalesAgentTrait;

    use ElementTrait {
        __construct as superConstruct;
    }

    protected string $email = '';
    protected string $nick = '';
    protected string $gender = '';
    protected array $userGroups = [];
    protected array $billingAddresses = [];
    protected array $shippingAddresses = [];
    protected string $uniqueId = '';
    protected ?Date $birthday = null;
    protected ?Date $lastUsed = null;
    protected string $languageCode = '';
    protected string $currencyCode = '';
    protected bool $useShippingAddress = false;
    protected bool $verified = false;
    protected bool $blogVerified = false;
    protected bool $active = false;
    protected string $image = '';
    protected bool $supplier = false;
    protected bool $blogger = false;
    protected int $parentId = 0;
    protected int $selectedBillingAddressId = 0;
    protected int $selectedShippingAddressId = 0;
    protected ?UserAdditionalInformation $userAdditionalInformation = null;

    /**
     *
     * @see \SDK\Core\Dtos\Traits\ElementTrait::__construct()
     */
    public function __construct(array $data = []) {
        if (isset($data['user'])) {
            $userAdditionalInformation = [];
            foreach ($data as $key => $value) {
                if ($key != 'user') {
                    $userAdditionalInformation[$key] = $value;
                }
            }
            $data['user']['userAdditionalInformation'] = $userAdditionalInformation;
            $data = $data['user'];
        } else {
            $this->userAdditionalInformation = new UserAdditionalInformation();
        }
        $this->superConstruct($data);
    }

    /**
     * Returns the user email.
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Returns the user nick.
     *
     * @return string
     */
    public function getNick(): string {
        return $this->nick;
    }

    /**
     * Returns the user gender.
     *
     * @return string
     */
    public function getGender(): string { // ENUM
        return $this->getEnum(Gender::class, $this->gender, '');
    }

    /**
     * Returns the user groups where this user belongs
     *
     * @return UserGroup[]
     */
    public function getUserGroups(): array {
        return $this->userGroups;
    }

    protected function setUserGroups(array $userGroups): void {
        $this->userGroups = $this->setArrayField($userGroups, UserGroup::class);
    }

    /**
     * Returns the user unique Id
     *
     * @return string
     */
    public function getUniqueId(): string {
        return $this->uniqueId;
    }

    /**
     * Returns the user's birthday.
     *
     * @return Date|NULL
     */
    public function getBirthday(): ?Date {
        return $this->birthday;
    }

    protected function setBirthday(string $birthday): void {
        $this->birthday = Date::create($birthday);
    }

    /**
     * Returns the date when the user was used for the last time.
     *
     * @return Date|NULL
     */
    public function getLastUsed(): ?Date {
        return $this->lastUsed;
    }

    protected function setLastUsed(string $lastUsed): void {
        $this->lastUsed = Date::create($lastUsed);
    }

    /**
     * Returns the user's default language initials
     *
     * @return string
     */
    public function getLanguageCode(): string {
        return $this->languageCode;
    }

    /**
     * Returns the user's default currency code
     *
     * @return string
     */
    public function getCurrencyCode(): string {
        return $this->currencyCode;
    }

    /**
     * Sets if the user wants to use the shipping address or not.
     *
     * @return bool
     */
    public function getUseShippingAddress(): bool {
        return $this->useShippingAddress;
    }

    /**
     * Sets if the user is verified or not.
     *
     * @return bool
     */
    public function getVerified(): bool {
        return $this->verified;
    }

    /**
     * Sets if the user is verified on the blog or not.
     *
     * @return bool
     */
    public function getBlogVerified(): bool {
        return $this->blogVerified;
    }

    /**
     * Sets if the user is active or not.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Returns the user image.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Sets if the user is a supplier or not.
     *
     * @return bool
     */
    public function getSupplier(): bool {
        return $this->supplier;
    }

    /**
     * Sets if the user is blogger or not.
     *
     * @return bool
     */
    public function getBlogger(): bool {
        return $this->blogger;
    }

    /**
     * Returns the user parent internal identifier.
     *
     * @return int
     */
    public function getParentId(): int {
        return $this->parentId;
    }

    /**
     * Returns the user selected billing address internal identifier.
     *
     * @return int
     */
    public function getSelectedBillingAddressId(): int {
        return $this->selectedBillingAddressId;
    }

    /**
     * Returns the user selected shipping address internal identifier.
     *
     * @return int
     */
    public function getSelectedShippingAddressId(): int {
        return $this->selectedShippingAddressId;
    }

    /**
     * Returns the user billing addresses.
     *
     * @return BillingAddress[]
     */
    public function getBillingAddresses(): array {
        return $this->billingAddresses;
    }

    /**
     * Returns the user default billing address.
     *
     * @return BillingAddress|NULL
     */
    public function getDefaultBillingAddress(): ?BillingAddress {
        return $this->getDefaultAddress($this->getBillingAddresses());
    }

    protected function setBillingAddresses(array $billingAddresses): void {
        $this->billingAddresses = $this->setArrayField($billingAddresses, BillingAddress::class);
    }

    /**
     * Returns the user shipping addresses.
     *
     * @return ShippingAddress[]
     */
    public function getShippingAddresses(): array {
        return $this->shippingAddresses;
    }

    /**
     * Returns the user default shipping address.
     *
     * @return ShippingAddress|NULL
     */
    public function getDefaultShippingAddress(): ?ShippingAddress {
        return $this->getDefaultAddress($this->getShippingAddresses());
    }

    protected function setShippingAddresses(array $shippingAddresses): void {
        $this->shippingAddresses = $this->setArrayField($shippingAddresses, ShippingAddress::class);
    }

    /**
     * Returns the user address filtered by the given id.
     *
     * @param int $id
     *            Identifier of the address you want to get. 
     * @param int $id
     *            If the given id is 0, the default address will be returned by the AddressType given.
     * @see Address
     * @see SDK\Enums\AddressType
     * @return Address|NULL
     */
    public function getAddress(int $id, string $addressType = ''): ?Address {
        if ($id == 0 && $addressType !== '') {
            if ($addressType == AddressType::BILLING || $addressType == AccountAddressType::INVOICING) {
                $addresses = $this->getBillingAddresses();
            } elseif ($addressType == AddressType::SHIPPING) {
                $addresses = $this->getShippingAddresses();
            }
        } else {
            $addresses = [...$this->getBillingAddresses(), ...$this->getShippingAddresses()];
        }

        foreach ($addresses as $address) {
            if ($address->getId() === $id) {
                return $address;
            }
        }
        return null;
    }

    protected function getDefaultAddress(array $addresses): ?Address {
        foreach ($addresses as $address) {
            if ($address->getDefaultAddress()) {
                return $address;
            }
        }
        return null;
    }

    /**
     * Returns the user additional information.
     *
     * @return UserAdditionalInformation|NULL
     */
    public function getUserAdditionalInformation(): ?UserAdditionalInformation {
        return $this->userAdditionalInformation;
    }

    protected function setUserAdditionalInformation(array $userAdditionalInformation): void {
        $this->userAdditionalInformation = new UserAdditionalInformation($userAdditionalInformation);
    }
}
