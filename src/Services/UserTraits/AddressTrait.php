<?php

declare(strict_types=1);

namespace SDK\Services\UserTraits;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Factories\AccountAddressToAddressFactory;
use SDK\Core\Dtos\Factories\AccountInvoicingAddressToBillingAddressFactory;
use SDK\Core\Dtos\Factories\AccountShippingAddressToShippingAddressFactory;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Resources\BatchRequests;
use SDK\Core\Services\Parameters\Factories\UserToAccountFactory;
use SDK\Dtos\User\Address;
use SDK\Dtos\User\AddressValidated;
use SDK\Dtos\User\BillingAddress;
use SDK\Dtos\User\ShippingAddress;
use SDK\Enums\AccountKey;
use SDK\Enums\PluginConnectorType;
use SDK\Services\FormService;
use SDK\Services\PluginService;
use SDK\Services\Parameters\Groups\PluginConnectorTypeParametersGroup;
use SDK\Services\Parameters\Groups\User\Addresses\AddressParametersGroup;
use SDK\Services\Parameters\Groups\User\Addresses\AddressValidateParametersGroup;
use SDK\Services\Parameters\Groups\User\Addresses\BillingAddressParametersGroup;
use SDK\Services\Parameters\Groups\User\Addresses\ShippingAddressParametersGroup;

/**
 * This is the user address trait.
 * The methods that manage addresses requests to the API will be located here.
 *
 * @see AddressTrait::getAddress()
 * @see AddressTrait::createBillingAddress()
 * @see AddressTrait::createShippingAddress()
 * @see AddressTrait::updateBillingAddress()
 * @see AddressTrait::updateShippingAddress()
 * @see AddressTrait::deleteAddress()
 * @see AddressTrait::getBillingAddresses()
 * @see AddressTrait::getShippingAddresses()
 * @see Address
 * @see BillingAddress
 * @see ShippingAddress
 *
 * @see AddressTrait::addGetAddress()
 * @see AddressTrait::addGetBillingAddresses()
 * @see AddressTrait::addGetShippingAddresses()
 * @see BatchRequests
 *
 * @package SDK\Services\UserTraits
 */
trait AddressTrait {

    public const ADDRESS_VALIDATE_PARAM = ['address', 'location'];

    /**
     * Returns the address identified by the given id
     *
     * @param int $id
     *
     * @return Address|NULL
     * deprecated use AccountService::getAccountsAddresses instead
     */
    public function getAddress(int $id = 0): ?Address {
        return $this->getElement(AccountAddressToAddressFactory::class, Resource::ACCOUNTS_ADDRESSES_ID, $id);
    }

    /**
     * Update the billing address identified by the given id.
     *
     * @param int $id
     * @param BillingAddressParametersGroup $data
     * @param string $dataValidatior
     *            Data validatior PId to apply
     *
     * @return Address|NULL
     * deprecated use AccountService::updateAccountsInvoicingAddresses instead
     */
    public function updateBillingAddress(int $id, BillingAddressParametersGroup $data = null, string $dataValidatior = ''): ?Address {
        $data = UserToAccountFactory::mapBillingAddressFromAccountInvoicingAddressCompatible($data);
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNTS_INVOICING_ADDRESSES_UPDATE)->pathParams(['id' => $id])->method(self::PUT)
                ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                ->body($data)->build()),
            AccountInvoicingAddressToBillingAddressFactory::class
        );
    }

    /**
     * Update the shipping address identified by the given id.
     *
     * @param int $id
     * @param ShippingAddressParametersGroup $data
     * @param string $dataValidatior
     *            Data validatior PId to apply
     *
     * @return Address|NULL
     * deprecated use AccountService::updateAccountsShippingAddresses instead
     */
    public function updateShippingAddress(int $id, ShippingAddressParametersGroup $data = null, string $dataValidatior = ''): ?Address {
        $data = UserToAccountFactory::mapShippingAddressFromAccountShippingAddress($data);
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNTS_SHIPPING_ADDRESSES_UPDATE)->pathParams(['id' => $id])->method(self::PUT)
                ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                ->body($data)->build()),
            AccountShippingAddressToShippingAddressFactory::class
        );
    }

    /**
     * Create new billing for the current user.
     *
     * @param BillingAddressParametersGroup $data
     * @param string $dataValidatior
     *            Data validatior PId to apply
     * 
     * @return Address|NULL
     * deprecated use AccountService::createAccountInvoicingAddresses instead
     */
    public function createBillingAddress(BillingAddressParametersGroup $data = null, string $dataValidatior = ''): ?BillingAddress {
        $data = UserToAccountFactory::mapBillingAddressFromAccountInvoicingAddressCompatible($data);
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_INVOICING_ADDRESSES, ['idUsed' => AccountKey::USED]))->method(self::POST)
                    ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                    ->body($data)->build()
            ),
            AccountInvoicingAddressToBillingAddressFactory::class
        );
    }

    /**
     * Create new shipping address for the current user.
     *
     * @param ShippingAddressParametersGroup $data
     * @param string $dataValidatior
     *            Data validatior PId to apply
     *
     * @return Address|NULL
     * deprecated use AccountService::createAccountShippingAddresses instead
     */
    public function createShippingAddress(ShippingAddressParametersGroup $data = null, string $dataValidatior = ''): ?ShippingAddress {
        $data = UserToAccountFactory::mapShippingAddressFromAccountShippingAddress($data);
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_SHIPPING_ADDRESSES, ['idUsed' => AccountKey::USED]))->method(self::POST)
                    ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                    ->body($data)->build()
            ),
            AccountShippingAddressToShippingAddressFactory::class
        );
    }

    /**
     * Create new address for the current user.
     *
     * @param string $resource
     * @param string $class
     * @param AddressParametersGroup $data
     * @param string $dataValidatior
     *            Data validatior PId to apply
     * 
     * @return Address|NULL
     * deprecated
     */
    private function createAddress(string $resource, string $class, AddressParametersGroup $data = null, string $dataValidatior = ''): ?Address {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($resource)->method(self::POST)
                ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                ->body($data)
                ->build()),
            $class
        );
    }

    /**
     * Delete the user address identified by the given id
     *
     * @param int $id
     *
     * @return Status|NULL
     * deprecated use AccountService::deleteAccountAddress instead
     */
    public function deleteAddress(int $id): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ACCOUNTS_ADDRESSES_ID)->method(self::DELETE)->pathParams(['id' => $id])->build()
            ),
            Status::class
        );
    }

    /**
     * Validates the address specified. The validation is done by the address validator plugin configured in the Commerce.
     *
     * @param AddressValidateParametersGroup $data
     *
     * @return AddressValidated|NULL
     */
    public function addressValidate(AddressValidateParametersGroup $data): ?AddressValidated {
        $params = new PluginConnectorTypeParametersGroup();
        $params->setType(PluginConnectorType::TAXES);
        if (count($data->toArray()) === 0) {
            return new AddressValidated(['valid' => true]);
        }
        $params->setCountryCode($data->getLocation()->getCountryCode());
        /** @var \SDK\Services\PluginService */
        $pluginService = PluginService::getInstance();
        $taxesPlugins = $pluginService->getPlugins($params);
        $validate = !empty($taxesPlugins->getItems());

        if ($validate) {
            foreach (array_keys($data->toArray()) as $key) {
                if (in_array($key, self::ADDRESS_VALIDATE_PARAM)) {
                    $validate = true;
                    break;
                }
            }
        }

        if ($validate) {
            return $this->prepareElement(
                $this->call(
                    (new RequestBuilder())->path(Resource::ADDRESS_VALIDATE)->method(self::POST)->body($data)->build()
                ),
                AddressValidated::class
            );
        } else {
            return new AddressValidated(['valid' => true]);
        }
    }

    /**
     * Returns the billing addresses for the current user
     *
     * @return ElementCollection|NULL
     * deprecated use AccountService::getInvoicingAddresses instead
     */
    public function getBillingAddresses(): ?ElementCollection {
        return $this->getElements(AccountInvoicingAddressToBillingAddressFactory::class, $this->replaceWildcards(Resource::ACCOUNTS_INVOICING_ADDRESSES, ['idUsed' => AccountKey::USED]));
    }

    /**
     * Returns the shipping addresses for the current user
     *
     * @return ElementCollection|NULL
     * deprecated use AccountService::getShippingAddresses instead
     */
    public function getShippingAddresses(): ?ElementCollection {
        return $this->getElements(AccountShippingAddressToShippingAddressFactory::class, $this->replaceWildcards(Resource::ACCOUNTS_SHIPPING_ADDRESSES, ['idUsed' => AccountKey::USED]));
    }

    /**
     * Add the request to get the address identified by the given id
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     * deprecated use AccountService::addGetAccountsAddresses instead
     */
    public function addGetAddress(BatchRequests $batchRequests, string $batchName, int $id = 0): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_ADDRESSES_ID)->pathParams(['id' => $id])->build(), true);
    }

    /**
     * Add the request to get the billing addresses for the current user
     *
     * @return void
     * deprecated use AccountService::addGetInvoicingAddresses instead
     */
    public function addGetBillingAddresses(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_INVOICING_ADDRESSES)->pathParams(['idUsed' => AccountKey::USED])->build(), true);
    }

    /**
     * Add the request to get the shipping addresses for the current user
     *
     * @return void
     * deprecated use AccountService::addGetShippingAddresses instead
     */
    public function addGetShippingAddresses(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::USER_SHIPPING_ADDRESSES)->build());
    }
}
