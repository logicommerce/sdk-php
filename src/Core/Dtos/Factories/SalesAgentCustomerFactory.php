<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\User\SalesAgentCustomer;
use SDK\Dtos\User\User;

/**
 * This is the factory class for creating a User from a Sales Agent Customer.
 *
 * @see SalesAgentCustomerFactory::create()
 * @see SalesAgentCustomerFactory::getElement()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class SalesAgentCustomerFactory extends Factory {

    protected static function accountToUser(array $account): array {
        $master      = $account['master'] ?? [];
        $regUser     = $master['registeredUser'] ?? [];

        // Direcciones de facturación
        $billingAddresses = [];
        $selectedBillingId = 0;
        foreach ($account['invoicingAddresses'] ?? [] as $addr) {
            $billingItem = $addr; // clona todo
            $billingItem['defaultAddress'] = (bool)($addr['defaultOne'] ?? false);
            $billingItem['userType']       = $addr['customerType'] ?? null;
            unset($billingItem['defaultOne'], $billingItem['customerType']);
            /*if ($billingItem['defaultAddress'] && !$selectedBillingId) {
                $selectedBillingId = (int)($billingItem['id'] ?? 0);
            }*/
            $billingAddresses[] = $billingItem;
        }

        // Grupos de usuario
        $userGroups = [];
        if (!empty($account['group'])) {
            $group = $account['group'];
            $groupItem = $group; // clona todo
            $groupItem['defaultGroup'] = (bool)($group['defaultOne'] ?? false);
            unset($groupItem['defaultOne']);
            $userGroups[] = $groupItem;
        }

        return [
            'id'                        => (int)($account['id'] ?? 0),
            'email'                     => $regUser['email'] ?? null,
            'gender'                    => $regUser['gender'] ?? null,
            'userGroups'                => $userGroups,
            'billingAddresses'          => $billingAddresses,
            'selectedBillingAddressId'  => $selectedBillingId,
            'shippingAddresses'         => $account['shippingAddresses'] ?? [],
            'selectedShippingAddressId' => 0,
            'birthday'                  => $regUser['birthday'] ?? null,
            'lastUsed'                  => $account['lastUsed'] ?? null,
            'dateAdded'                 => $account['dateAdded'] ?? null,
            'currencyCode'              => $master['defaultCurrencyCode'] ?? null,
            'useShippingAddress'        => (bool)($master['useShippingAddress'] ?? false),
            'verified'                  => true,
            'blogVerified'              => false,
            'active'                    => (($account['status'] ?? '') === 'ENABLED'),
            'subscribed'                => false,
            'image'                     => $regUser['image'] ?? ($account['image'] ?? ''),
            'supplier'                  => (bool)($regUser['supplier'] ?? false),
            'blogger'                   => (bool)($regUser['blogger'] ?? false),
            'parentId'                  => null,
            'customTagValues'           => $account['customTagValues'] ?? [],
            'salesAgent'                => (bool)($regUser['salesAgent'] ?? false),
            'salesAgentId'              => $regUser['salesAgentId'] ?? null,
            'languageCode'              => $master['defaultLanguageCode'] ?? null,
            'uniqueId'                  => '',
            'nick'                      => null,
            'pId'                       => null,
        ];
    }
    /**
     * Creates a SalesAgentCustomer from an array.
     *
     * @param array $data
     * @return SalesAgentCustomer|null
     */
    public static function create(array $data): ?SalesAgentCustomer {
        $userArray = self::accountToUser($data['account']);
        unset($data['account']);
        $data['user'] = $userArray;
        return new SalesAgentCustomer($data);
    }

    public static function getElement(array $data = []): ?SalesAgentCustomer {
        return self::create($data);
    }
}
