<?php

declare(strict_types=1);

namespace SDK\Services\AccountTraits;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Factories\AccountAddressFactory;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Resources\BatchRequests;
use SDK\Dtos\Accounts\AccountAddress;
use SDK\Dtos\Accounts\AccountInvoicingAddress;
use SDK\Dtos\Accounts\AccountShippingAddress;
use SDK\Enums\AccountKey;
use SDK\Services\FormService;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountInvoicingAddressCompatibleParametersGroup;
use SDK\Services\Parameters\Groups\Account\Addresses\AccountShippingAddressParametersGroup;
use SDK\Services\Parameters\Groups\Account\GetAccountInvoicingAddressParametersGroup;
use SDK\Services\Parameters\Groups\Account\GetAccountShippingAddressParametersGroup;

/**
 * This is the AccountAddressTrait trait.
 * The purpose of this trait is to encapsulate the logic for handling account-related addresses such as invoicing and shipping addresses.
 * It includes methods for retrieving, updating, creating, and deleting account addresses, as well as batch processing for address-related requests.
 *
 * @see AccountAddressTrait::getAccountsAddresses()
 * @see AccountAddressTrait::updateAccountsInvoicingAddresses()
 * @see AccountAddressTrait::updateAccountsShippingAddresses()
 * @see AccountAddressTrait::createAccountInvoicingAddresses()
 * @see AccountAddressTrait::createAccountShippingAddresses()
 * @see AccountAddressTrait::deleteAccountAddress()
 * @see AccountAddressTrait::getInvoicingAddresses()
 * @see AccountAddressTrait::getShippingAddresses()
 * @see AccountAddressTrait::addGetAccountsAddresses()
 * @see AccountAddressTrait::addGetInvoicingAddresses()
 * @see AccountAddressTrait::addGetShippingAddresses()
 * 
 * @package SDK\Services\AccountTraits
 */
trait AccountAddressTrait {

    /**
     * Returns the account with the given id
     *
     * @param int $id
     * 
     * @return AccountAddress|NULL
     */
    public function getAccountsAddresses(int $id): ?AccountAddress {
        return $this->getElement(AccountAddressFactory::class, Resource::ACCOUNTS_ADDRESSES_ID, $id);
    }

    /**
     * Update accounts invoicing addresses
     *
     * @param int $id
     *            Account ID
     * @param AccountInvoicingAddressCompatibleParametersGroup $data
     *            object with the needed filters to send to the API accounts resource
     * 
     * @return AccountInvoicingAddress|NULL
     */
    public function updateAccountsInvoicingAddresses(int $id, AccountInvoicingAddressCompatibleParametersGroup $data, string $dataValidatior = ''): ?AccountInvoicingAddress {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNTS_INVOICING_ADDRESSES_UPDATE)->pathParams(['id' => $id])->method(self::PUT)
                ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                ->body($data)->build()),
            AccountInvoicingAddress::class
        );
    }

    /**
     * Update accounts shipping addresses
     *
     * @param int $id
     *            Account ID
     * @param AccountShippingAddressParametersGroup $data
     *            object with the needed filters to send to the API accounts resource
     * 
     * @return AccountShippingAddress|NULL
     */
    public function updateAccountsShippingAddresses(int $id, AccountShippingAddressParametersGroup $data, string $dataValidatior = ''): ?AccountShippingAddress {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNTS_SHIPPING_ADDRESSES_UPDATE)->pathParams(['id' => $id])->method(self::PUT)
                ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                ->body($data)->build()),
            AccountShippingAddress::class
        );
    }

    /**
     * Create account invoicing address
     * 
     * @param string $idUsed
     * @param AccountInvoicingAddressCompatibleParametersGroup $data
     *
     * @return AccountInvoicingAddress|NULL
     */
    public function createAccountInvoicingAddresses(string $idUsed, AccountInvoicingAddressCompatibleParametersGroup $data, string $dataValidatior = ''): ?AccountInvoicingAddress {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_INVOICING_ADDRESSES, ['idUsed' => $idUsed]))->method(self::POST)
                    ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                    ->body($data)->build()
            ),
            AccountInvoicingAddress::class
        );
    }

    /**
     * Create account shipping address
     * 
     * @param string $idUsed
     * @param AccountShippingAddressParametersGroup $data
     *
     * @return AccountShippingAddress|NULL
     */
    public function createAccountShippingAddresses(string $idUsed, AccountShippingAddressParametersGroup $data, string $dataValidatior = ''): ?AccountShippingAddress {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_SHIPPING_ADDRESSES, ['idUsed' => $idUsed]))->method(self::POST)
                    ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                    ->body($data)->build()
            ),
            AccountShippingAddress::class
        );
    }

    /**
     * Delete address
     *
     * @param int $id
     *
     * @return Status|NULL
     */
    public function deleteAccountAddress(int $id): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ACCOUNTS_ADDRESSES_ID)->method(self::DELETE)->pathParams(['id' => $id])->build()
            ),
            Status::class
        );
    }

    /**
     * Returns the invoicing addresses filtered with the given parameters for the current account
     *
     * @param string $idUsed
     * @param GetAccountInvoicingAddressParametersGroup $params
     *
     * @return ElementCollection|NULL
     */
    public function getInvoicingAddresses(string $idUsed = AccountKey::USED, GetAccountInvoicingAddressParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(AccountInvoicingAddress::class, $this->replaceWildcards(Resource::ACCOUNTS_INVOICING_ADDRESSES, ['idUsed' => $idUsed]), $params);
    }

    /**
     * Returns the shipping addresses filtered with the given parameters for the current account
     *
     * @param string $idUsed
     * @param GetAccountShippingAddressParametersGroup $params
     *
     * @return ElementCollection|NULL
     */
    public function getShippingAddresses(string $idUsed = AccountKey::USED, GetAccountShippingAddressParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(AccountShippingAddress::class, $this->replaceWildcards(Resource::ACCOUNTS_SHIPPING_ADDRESSES, ['idUsed' => $idUsed]), $params);
    }

    /**
     * Add the request to get the account addresses filtered with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $id
     *
     * @return void
     */
    public function addGetAccountsAddresses(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_ADDRESSES_ID)->pathParams(['id' => $id])->build()
        );
    }

    /**
     * Add the request to get the invoicing addresses filtered with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $idUsed
     * @param GetAccountInvoicingAddressParametersGroup $params
     *
     * @return void
     */
    public function addGetInvoicingAddresses(BatchRequests $batchRequests, string $batchName, string $idUsed = AccountKey::USED, GetAccountInvoicingAddressParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_INVOICING_ADDRESSES)->pathParams(['idUsed' => $idUsed])->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the shipping addresses filtered with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $idUsed
     * @param GetAccountShippingAddressParametersGroup $params
     *
     * @return void
     */
    public function addGetShippingAddresses(BatchRequests $batchRequests, string $batchName, string $idUsed = AccountKey::USED, GetAccountShippingAddressParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_SHIPPING_ADDRESSES)->pathParams(['idUsed' => $idUsed])->urlParams($params)
                ->build()
        );
    }
}
