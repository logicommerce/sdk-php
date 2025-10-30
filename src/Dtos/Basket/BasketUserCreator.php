<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\CustomTagValue;
use SDK\Dtos\Accounts\AccountShippingAddress;
use SDK\Dtos\Accounts\AcountLinkedTypes\CustomerAccountLinked;
use SDK\Dtos\Accounts\PurchaseAddress;
use SDK\Dtos\Location;
use SDK\Dtos\User\User;
use SDK\Enums\AccountStatus;
use SDK\Enums\SessionType;
use SDK\Enums\SessionUsageModeType;

/**
 * Class BasketUserCreator.
 * This class is responsible for creating a BasketUser from basket data.
 * BasketUser is a deprecated class that will be removed in the future.
 * 
 * @deprecated This class is deprecated and will be removed in the future.
 * 
 * @package SDK\Dtos\Basket
 */
class BasketUserCreator {

    /**
     * @param Basket $basket
     * @param BasketUser|null $basketUser
     * @return BasketUser
     */
    public static function create(Basket $basket): ?BasketUser {
        $basketUser = new BasketUser([]);
        if (is_null($basket->getCustomer())) {
            return $basketUser;
        }
        if (!is_null($basket->getAccountRegisteredUser())) {
            $lastVisit = $basket->getAccountRegisteredUser()->getLastVisit();
            $basketUser->setLastVisitFromDate($lastVisit);
        }
        $basketUser->setReferer($basket->getReferer() ?? '');
        $basketUser->setUserAgent($basket->getUserAgent() ?? '');
        $basketUser->setNavigationHash($basket->getNavigationHash());
        $basketUser->defineChannel($basket->getChannel());
        $basketUser->defineUser(self::getUser($basket));
        if (is_null($basket->getMode()) || $basket->getMode()->getType() === SessionUsageModeType::USUAL) {
            $basketUser->setSimulatedUser(false);
            $basketUser?->getUser()?->getUserAdditionalInformation()?->setSimulatedUser(false);
        } else {
            $basketUser->setSimulatedUser(true);
            $basketUser?->getUser()?->getUserAdditionalInformation()?->setSimulatedUser(true);
        }
        return $basketUser;
    }

    private static function getUser(Basket $basket): User {
        $user = [];
        if (!is_null($basket->getAccountRegisteredUser())) {
            $user = [
                ...$user,
                'id' => $basket->getAccountRegisteredUser()->getAccountId(),
                'pId' => $basket->getAccount()->getPId(),
                'active' => $basket->getAccountRegisteredUser()->getStatus() === AccountStatus::ENABLED,
                'verified' => $basket->getAccountRegisteredUser()->getStatus() === AccountStatus::ENABLED,
            ];
        }
        if (!is_null($basket->getRegisteredUser())) {
            $user = [
                ...$user,
                'nick' => $basket->getRegisteredUser()->getUsername(),
                'salesAgent' => $basket->getRegisteredUser()->isSalesAgent(),
                'salesAgentId' => $basket->getRegisteredUser()->getSalesAgentId(),
                'blogger' => $basket->getRegisteredUser()->isBlogger(),
                'supplier' => $basket->getRegisteredUser()->isSupplier(),
                'image' => $basket->getRegisteredUser()->getImage(),
            ];
        }
        if (!is_null($basket->getAccount())) {
            $user = [
                ...$user,
                'userGroups' => [
                    [
                        'id' => $basket->getAccount()->getGroup()->getId(),
                        'pId' => $basket->getAccount()->getGroup()->getPId(),
                        'name' => $basket->getAccount()->getGroup()->getName(),
                        'description' => $basket->getAccount()->getGroup()->getDescription(),
                        'defaultOne' => $basket->getAccount()->getGroup()->isDefaultOne(),
                        'systemGroup' => $basket->getAccount()->getGroup()->isSystemGroup(),
                    ]
                ],
                'dateAdded' => $basket->getAccount()->getDateAdded()->originalFormat(),
                'uniqueId' => $basket->getAccount()->getUniqueId(),
            ];

            if (!is_null($basket->getAccount()->getLastUsed())) {
                $user = [
                    ...$user,
                    'lastUsed' => $basket->getAccount()->getLastUsed()->originalFormat(),
                ];
            }
        }

        $user = [
            ...$user,
            'userAdditionalInformation' => [
                'lastVisit' => $basket?->getAccountRegisteredUser()?->getLastVisit()?->originalFormat(),
                'referer' => $basket?->getReferer(),
                'userAgent' => $basket?->getUserAgent(),
                'channel' => $basket?->getChannel()?->toArray(),
                'simulatedUser' => false,
                'navigationHash' => $basket?->getNavigationHash(),
                'sessionType' => $basket?->getType()?->value,

            ]
        ];
        $user = [
            ...$user,
            'email' => $basket->getCustomer()->getEmail(),
            'gender' => $basket->getCustomer()->getGender(),
            'billingAddresses' => self::getBillingAddresses($basket),
            'shippingAddresses' => self::getShippingAddresses($basket),
            'useShippingAddress' => $basket->getCustomer()->isUseShippingAddress(),
            'birthday' => $basket->getCustomer()->getBirthday(),
            'currencyCode' => $basket->getNavigationCurrencyCode(),
            'languageCode' => $basket->getNavigationLanguageCode(),
            'customTagValues' => self::getCustomTagValues($basket->getCustomer()->getCustomTagValues()),
        ];

        if ($basket->getType() === SessionType::REGISTERED) {
            /** @var CustomerAccountLinked $linkedCustomer */
            $linkedCustomer = $basket->getCustomer();
            $user = [
                ...$user,
                'selectedBillingAddressId' => $linkedCustomer->getSelectedInvoicingAddressId(),
                'selectedShippingAddressId' => $linkedCustomer->getSelectedShippingAddressId(),
            ];
        }
        return new User($user);
    }

    private static function getCustomTagValues(array $customTagValues): array {
        $customTagValuesArray = [];
        /** @var CustomTagValue $customTagValue */
        foreach ($customTagValues as $customTagValue) {
            $customTagValuesArray[] = [
                'name' => $customTagValue->getName(),
                'position' => $customTagValue->getPosition(),
                'customTagId' => $customTagValue->getCustomTagId(),
                'customTagPId' => $customTagValue->getCustomTagPId(),
                'value' => $customTagValue->getValue(),
            ];
        }
        return $customTagValuesArray;
    }

    private static function getBillingAddresses(Basket $basket): array {
        if (is_null($basket->getAccount())) {
            return []; // return billing address from customer
        }
        $billingAddresses = [];
        foreach ($basket->getAccount()->getInvoicingAddresses() as $address) {
            $billingAddresses[] = self::getAddress($address, true);
        }
        return $billingAddresses;
    }

    private static function getShippingAddresses(Basket $basket): array {
        if (is_null($basket->getAccount())) {
            return []; // return shiiping address from customer
        }
        $shippinhAddresses = [];
        foreach ($basket->getAccount()->getShippingAddresses() as $address) {
            $shippinhAddresses[] = self::getAddress($address, false);
        }
        return $shippinhAddresses;
    }

    private static function getAddress(PurchaseAddress $address, bool $invoice): array {
        $oldAddress = [
            'firstName' => $address->getFirstName(),
            'lastName' => $address->getLastName(),
            'company' => $address->getCompany(),
            'address' => $address->getAddress(),
            'addressAdditionalInformation' => $address->getAddressAdditionalInformation(),
            'number' => $address->getNumber(),
            'city' => $address->getCity(),
            'state' => $address->getState(),
            'postalCode' => $address->getPostalCode(),
            'vat' => $address->getVat(),
            'nif' => $address->getNif(),
            'location' => self::getLocation($address->getLocation()),
            'phone' => $address->getPhone(),
            'mobile' => $address->getMobile(),
            'fax' => $address->getFax(), // And telegraph?
            'type' => $address->getType(),
            'alias' => $address->getAlias(),
        ];
        if ($invoice) {
            /** @var AccountInvoicingAddress $invoiceAddress */
            $invoiceAddress = $address;
            return [
                ...$oldAddress,
                'id' => $invoiceAddress->getId(),
                'pId' => $invoiceAddress->getPId(),
                'defaultAddress' => $invoiceAddress->getDefaultOne(),
                'tax' => $invoiceAddress->isTax(),
                're' => $invoiceAddress->isRe(),
                'reverseChargeVat' => $invoiceAddress->isReverseChargeVat(),
                'userType' => $invoiceAddress->getCustomerType(),
            ];
        }
        /** @var AccountShippingAddress $shippingAddress */
        $shippingAddress = $address;
        return [
            ...$oldAddress,
            'id' => $shippingAddress->getId(),
            'pId' => $shippingAddress->getPId(),
            'defaultAddress' => $shippingAddress->getDefaultOne(),
            'tax' => false,
        ];
    }

    private static function getLocation(?Location $location): array {
        if (is_null($location)) {
            return [];
        }
        return [
            'geographicalZone' => [
                'countryCode' => $location?->getGeographicalZone()?->getCountryCode(),
                'locationId' => $location?->getGeographicalZone()?->getLocationId(),
            ],
            'coordinate' => [
                'latitude' => $location?->getCoordinate()?->getLatitude(),
                'longitude' => $location?->getCoordinate()?->getLongitude(),
            ],
        ];
    }
}
