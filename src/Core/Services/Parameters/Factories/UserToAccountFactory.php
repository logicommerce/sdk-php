<?php

namespace SDK\Core\Services\Parameters\Factories;

use SDK\Application;
use SDK\Core\Resources\Date;
use SDK\Core\Services\Parameters\Groups\CustomTagDataParametersGroup;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Enums\AccountType;
use SDK\Enums\CustomerType;
use SDK\Enums\GeneralRestriction;
use SDK\Enums\UserKeyCriteria;
use SDK\Enums\UserType;
use SDK\Services\Parameters\Groups\Account\AccountParametersGroup;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountAddressParametersGroup;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountInvoicingAddressCompatibleParametersGroup;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountShippingAddressParametersGroup;
use SDK\Services\Parameters\Groups\Account\CreateAccountParametersGroup;
use SDK\Services\Parameters\Groups\Account\MasterParametersGroup;
use SDK\Services\Parameters\Groups\Account\MasterUpdateParametersGroup;
use SDK\Services\Parameters\Groups\Account\RegisteredUserParametersGroup;
use SDK\Services\Parameters\Groups\Account\UpdateAccountParametersGroup;
use SDK\Services\Parameters\Groups\Account\UpdateOmsBasketCustomerParametersGroup;
use SDK\Services\Parameters\Groups\Basket\SetBasketAddressesBookParametersGroup;
use SDK\Services\Parameters\Groups\CoordinateParametersGroup;
use SDK\Services\Parameters\Groups\LocationParametersGroup;
use SDK\Services\Parameters\Groups\User\Addresses\BillingAddressParametersGroup;
use SDK\Services\Parameters\Groups\User\Addresses\ShippingAddressParametersGroup;
use SDK\Services\Parameters\Groups\User\CreateUserParametersGroup;
use SDK\Services\Parameters\Groups\User\UpdateUserParametersGroup;
use SDK\Services\Parameters\Groups\User\UserCustomTagParametersGroup;

/**
 * Class UserToAccountFactory
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Core\Services\Parameters\Factories
 */
abstract class UserToAccountFactory {
    private static function setIfNotNull(object $obj, string $method, $value): void {
        if ($value !== null) {
            $obj->{$method}($value);
        }
    }
    public static function mapUpdateUserToUpdateAccount(?UpdateUserParametersGroup $updateUser, bool $isMaster = true): UpdateAccountParametersGroup {
        $updateUser = $updateUser?->toArray();
        $updateAccount = new UpdateAccountParametersGroup();
        if (is_null($updateUser)) {
            return $updateAccount;
        }
        if ($isMaster) {
            // --- RegisteredUser ---
            $registeredUser = new RegisteredUserParametersGroup();
            self::setIfNotNull($registeredUser, 'setUsername',  $updateUser['nick'] ?? null);
            self::setIfNotNull($registeredUser, 'setEmail',     $updateUser['email'] ?? null);
            self::setIfNotNull($registeredUser, 'setFirstName', $updateUser['firstName'] ?? null);
            self::setIfNotNull($registeredUser, 'setLastName',  $updateUser['lastName'] ?? null);
            if (isset($updateUser['birthday'])) {
                self::setIfNotNull($registeredUser, 'setBirthday', Date::create($updateUser['birthday'])->getDateTime());
            }
            self::setIfNotNull($registeredUser, 'setImage',     $updateUser['image'] ?? null);
            self::setIfNotNull($registeredUser, 'setGender',    $updateUser['gender'] ?? null);
            self::setIfNotNull($registeredUser, 'setPId',       $updateUser['pId'] ?? null);
            //self::setCustomTagsFromArray($registeredUser, $updateUser['customTags']);

            $master = new MasterUpdateParametersGroup();
            if (count($registeredUser->toArray()) > 0) {
                $master->setRegisteredUser($registeredUser);
            }
            self::setIfNotNull($master, 'setUseShippingAddress', $updateUser['useShippingAddress'] ?? false);
            // --- UpdateAccountParametersGroup ---

            if (count($master->toArray()) > 0) {
                $updateAccount->setMaster($master);
            }
        }

        // CustomTags
        self::setCustomTagsFromArray($updateAccount, $updateUser['customTags'] ?? null);

        self::setIfNotNull($updateAccount, 'setImage', $updateUser['image'] ?? null);
        self::setIfNotNull($updateAccount, 'setEmail', $updateUser['email'] ?? null);
        self::setIfNotNull($updateAccount, 'setPId',   $updateUser['pId'] ?? null);

        return $updateAccount;
    }

    public static function mapCreateUserToCreateAccount(?CreateUserParametersGroup $createUser, string $generalRestriction = GeneralRestriction::ONLY_GENERAL): CreateAccountParametersGroup {
        $createUser = $createUser?->toArray();
        if (is_null($createUser)) {
            return new CreateAccountParametersGroup();
        }

        $registeredUser = new RegisteredUserParametersGroup();
        self::setIfNotNull($registeredUser, 'setUsername',   $createUser['nick'] ?? null);
        if (
            Application::getInstance()->getEcommerceSettings()->getUserAccountsSettings()->getUserKeyCriteria() === UserKeyCriteria::USERNAME
            && empty($createUser['nick'])
        ) {
            self::setIfNotNull($registeredUser, 'setUsername',  $createUser['email'] ?? null);
        }
        self::setIfNotNull($registeredUser, 'setEmail',      $createUser['email'] ?? null);
        self::setIfNotNull($registeredUser, 'setPId',        $createUser['pId'] ?? null);
        self::setIfNotNull($registeredUser, 'setPassword',   $createUser['password'] ?? null);
        if (isset($createUser['billingAddress'])) {
            self::setIfNotNull($registeredUser, 'setFirstName',  $createUser['billingAddress']['firstName'] ?? null);
            self::setIfNotNull($registeredUser, 'setLastName',   $createUser['billingAddress']['lastName'] ?? null);
        }
        if (isset($createUser['birthday'])) {
            self::setIfNotNull($registeredUser, 'setBirthday', Date::create($createUser['birthday'])->getDateTime());
        }
        self::setIfNotNull($registeredUser, 'setImage',      $createUser['image'] ?? null);
        self::setIfNotNull($registeredUser, 'setGender',     $createUser['gender'] ?? null);

        //self::setCustomTagsFromArray($registeredUser, $createUser['customTags']);

        $master = new MasterParametersGroup();
        if (count($registeredUser->toArray()) > 0) {
            $master->setRegisteredUser($registeredUser);
        }
        self::setIfNotNull($master, 'setUseShippingAddress', $createUser['useShippingAddress'] ?? null);

        $createAccount = new CreateAccountParametersGroup();

        if (!isset($createUser['billingAddress']['userType'])) {
            $createUser['billingAddress']['userType'] = UserType::INDIVIDUAL;
        }
        $accountType = AccountType::fromUserType($createUser['billingAddress']['userType'], $generalRestriction);

        $createAccount->setType($accountType);

        if (in_array($accountType, AccountType::getCompanyTypes())) {
            self::setIfNotNull($createAccount, 'setEmail', $createUser['email'] ?? null);
        }

        self::setAddresses($createUser, $createAccount);

        if (isset($createUser['createAccount']) && $createUser['createAccount']) {
            self::setIfNotNull($createAccount, 'setUseBasketCustomerAsBase', true);
            $createAccount->setUseBasketCustomerAsBase(true);
            $createAccount->setPostLogin(true);
        }
        if (count($master->toArray()) > 0) {
            $createAccount->setMaster($master);
        }

        self::setCustomTagsFromArray($createAccount, $createUser['customTags'] ?? null);

        self::setIfNotNull($createAccount, 'setPId', $createUser['pId'] ?? null);
        self::setIfNotNull($createAccount, 'setImage', $createUser['image'] ?? null);
        self::setIfNotNull($createAccount, 'setGroupPid', $createUser['groupPId'] ?? null);

        return $createAccount;
    }

    public static function mapCreateUserToUpdateOmsBasketCustomer(?CreateUserParametersGroup $createUser, string $generalRestriction = GeneralRestriction::ONLY_GENERAL): UpdateOmsBasketCustomerParametersGroup {
        $createUser = $createUser?->toArray();
        if (is_null($createUser)) {
            return new UpdateOmsBasketCustomerParametersGroup();
        }
        $updateCustomer = new UpdateOmsBasketCustomerParametersGroup();

        if (!isset($createUser['billingAddress']['userType'])) {
            $createUser['billingAddress']['userType'] = UserType::INDIVIDUAL;
        }
        $accountType = AccountType::fromUserType($createUser['billingAddress']['userType'], $generalRestriction);

        $updateCustomer->setType($accountType);
        /*if (in_array($accountType, AccountType::getCompanyTypes())) {
            self::setIfNotNull($updateCustomer, 'setEmail',      $createUser['email'] ?? null);
        }*/

        self::setIfNotNull($updateCustomer, 'setPId', $createUser['pId'] ?? null);
        self::setIfNotNull($updateCustomer, 'setEmail', $createUser['email'] ?? null);
        self::setIfNotNull($updateCustomer, 'setGender', $createUser['gender'] ?? null);
        if (isset($createUser['birthday'])) {
            self::setIfNotNull($updateCustomer, 'setBirthday', Date::create($createUser['birthday'])->getDateTime());
        }
        self::setIfNotNull($updateCustomer, 'setCustomerName', $createUser['nick'] ?? null);
        self::setIfNotNull($updateCustomer, 'setImage', $createUser['image'] ?? null);
        self::setCustomTagsFromArray($updateCustomer, $createUser['customTags'] ?? null);
        self::setIfNotNull($updateCustomer, 'setUseShippingAddress', $createUser['useShippingAddress'] ?? null);

        self::setAddresses($createUser, $updateCustomer);

        return $updateCustomer;
    }

    public static function mapSetAddressesBookToUpdateOmsBasketCustomer(?SetBasketAddressesBookParametersGroup $basketAddresses): UpdateOmsBasketCustomerParametersGroup {
        $basketAddresses = $basketAddresses?->toArray();
        if (is_null($basketAddresses)) {
            return new UpdateOmsBasketCustomerParametersGroup();
        }
        $updateCustomer = new UpdateOmsBasketCustomerParametersGroup();
        self::setIfNotNull($updateCustomer, 'setSelectedAccountInvoicingAddressId', $basketAddresses['billingAddressId'] ?? null);
        self::setIfNotNull($updateCustomer, 'setSelectedAccountShippingAddressId', $basketAddresses['shippingAddressId'] ?? null);
        self::setIfNotNull($updateCustomer, 'setUseShippingAddress', $basketAddresses['useShippingAddress'] ?? null);

        return $updateCustomer;
    }

    public static function mapBillingAddressFromAccountInvoicingAddressCompatible(?BillingAddressParametersGroup $address): ?AccountInvoicingAddressCompatibleParametersGroup {
        $address = $address?->toArray();
        if (is_null($address)) {
            return new AccountInvoicingAddressCompatibleParametersGroup();
        }
        $accountAddress = self::getAccountInvoicingAddressCompatibleParametersGroup($address);

        return $accountAddress;
    }

    public static function mapShippingAddressFromAccountShippingAddress(?ShippingAddressParametersGroup $address): ?AccountShippingAddressParametersGroup {
        $address = $address?->toArray();
        if (is_null($address)) {
            return new AccountShippingAddressParametersGroup();
        }
        $accountAddress = self::getAccountShippingAddressParametersGroup($address);
        return $accountAddress;
    }

    private static function setAddresses(array $user, AccountParametersGroup &$account): void {
        if (!empty($user['billingAddress'])) {
            $invoicingAddress = self::getAccountInvoicingAddressCompatibleParametersGroup($user['billingAddress']);
            self::setIfNotNull($account, 'setInvoicingAddress', $invoicingAddress);
        }
        if (!empty($user['shippingAddress'])) {
            $shippingAddress = self::getAccountShippingAddressParametersGroup($user['shippingAddress']);
            self::setIfNotNull($account, 'setShippingAddress', $shippingAddress);
        }
    }

    private static function getAccountInvoicingAddressCompatibleParametersGroup(array $address): AccountInvoicingAddressCompatibleParametersGroup {
        $invoicingAddress = new AccountInvoicingAddressCompatibleParametersGroup();
        self::fillAddressFromArray($invoicingAddress, $address);

        if (isset($address['userType']) && $address['userType'] != "") {
            $invoicingAddress->setCustomerType(CustomerType::fromUserType($address['userType']));
        }

        self::setIfNotNull($invoicingAddress, 'setRe', $address['re'] ?? null);
        self::setIfNotNull($invoicingAddress, 'setTax', $address['tax'] ?? null);

        return $invoicingAddress;
    }

    private static function getAccountShippingAddressParametersGroup(array $address): AccountShippingAddressParametersGroup {
        $shippingAddress = new AccountShippingAddressParametersGroup();
        self::fillAddressFromArray($shippingAddress, $address);

        return $shippingAddress;
    }

    private static function setCustomTagsFromArray(ParametersGroup &$param, ?array $customTags): void {
        $param->setCustomTags([]);
        if (empty($customTags)) {
            return;
        }
        foreach ($customTags as $tagData) {
            if (!is_array($tagData)) {
                continue;
            }
            $tag = new UserCustomTagParametersGroup();
            self::setIfNotNull($tag, 'setCustomTagId', $tagData['customTagId'] ?? null);

            if (!empty($tagData['data']) && is_array($tagData['data'])) {
                $customTagData = new CustomTagDataParametersGroup();
                self::setIfNotNull($customTagData, 'setValue', $tagData['data']['value'] ?? null);
                self::setIfNotNull($customTagData, 'setExtension', $tagData['data']['extension'] ?? null);
                self::setIfNotNull($customTagData, 'setFileName', $tagData['data']['fileName'] ?? null);
                $tag->setData($customTagData);
            }

            $param->addCustomTag($tag);
        }
    }

    private static function fillAddressFromArray(AccountAddressParametersGroup &$addressParametersGroup, array $address): void {
        self::setIfNotNull($addressParametersGroup, 'setFirstName', $address['firstName'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setLastName', $address['lastName'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setCompany', $address['company'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setAddress', $address['address'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setAddressAdditionalInformation', $address['addressAdditionalInformation'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setNumber', $address['number'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setCity', $address['city'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setState', $address['state'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setPostalCode', $address['postalCode'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setVat', $address['vat'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setNif', $address['nif'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setPhone', $address['phone'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setMobile', $address['mobile'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setFax', $address['fax'] ?? null);
        $locationObj = self::mapLocationFromArray($address['location'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setLocation', $locationObj);

        self::setIfNotNull($addressParametersGroup, 'setAlias', $address['alias'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setDefaultOne', $address['defaultAddress'] ?? null);
        self::setIfNotNull($addressParametersGroup, 'setPId', $address['pId'] ?? null);
    }

    private static function mapLocationFromArray(?array $locationData): ?LocationParametersGroup {
        if (empty($locationData)) {
            return null;
        }

        $location = new LocationParametersGroup();
        self::setIfNotNull($location, 'setCountryCode', $locationData['countryCode'] ?? null);
        self::setIfNotNull($location, 'setLocationId',  isset($locationData['locationId']) ? (int)$locationData['locationId'] : null);

        if (!empty($locationData['coordinate'])) {
            $coord = new CoordinateParametersGroup();
            self::setIfNotNull($coord, 'setLatitude',  isset($locationData['coordinate']['latitude']) ? (float)$locationData['coordinate']['latitude'] : null);
            self::setIfNotNull($coord, 'setLongitude', isset($locationData['coordinate']['longitude']) ? (float)$locationData['coordinate']['longitude'] : null);
            $location->setCoordinate($coord);
        }

        return $location;
    }
}
