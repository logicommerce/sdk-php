<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Application;
use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\CustomTag;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Factories\SalesAgentCustomerFactory;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Exceptions\InvalidParameterException;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Core\Services\Parameters\Factories\UserToAccountFactory;
use SDK\Dtos\Basket\Basket;
use SDK\Dtos\Basket\Voucher;
use SDK\Dtos\Catalog\RelatedItems;
use SDK\Dtos\User\RewardPointsBalance;
use SDK\Dtos\User\SalesAgentSales;
use SDK\Dtos\User\User;
use SDK\Dtos\User\UserExists;
use SDK\Dtos\User\UserOauth;
use SDK\Dtos\User\UserOauthUrl;
use SDK\Dtos\User\UserOrder;
use SDK\Dtos\User\UserRMA;
use SDK\Enums\AccountKey;
use SDK\Enums\RelatedItemsType;
use SDK\Services\Parameters\Groups\Account\DeleteAccountParametersGroup;
use SDK\Services\Parameters\Groups\CustomTagsParametersGroup;
use SDK\Services\Parameters\Groups\RelatedItemsParametersGroup;
use SDK\Services\Parameters\Groups\User\CreateUserParametersGroup;
use SDK\Services\Parameters\Groups\User\LoginParametersGroup;
use SDK\Services\Parameters\Groups\User\OrderParametersGroup;
use SDK\Services\Parameters\Groups\User\RecoverPasswordParametersGroup;
use SDK\Services\Parameters\Groups\User\RewardPointsParametersGroup;
use SDK\Services\Parameters\Groups\User\SalesAgentCustomersParametersGroup;
use SDK\Services\Parameters\Groups\User\SalesAgentOrdersParametersGroup;
use SDK\Services\Parameters\Groups\User\SalesAgentSalesParametersGroup;
use SDK\Services\Parameters\Groups\User\SetNewPasswordParametersGroup;
use SDK\Services\Parameters\Groups\User\UpdatePasswordParametersGroup;
use SDK\Services\Parameters\Groups\User\UpdateUserParametersGroup;
use SDK\Services\Parameters\Groups\User\UserCustomTagsParametersGroup;
use SDK\Services\Parameters\Groups\User\UserParametersGroup;
use SDK\Services\Parameters\Groups\User\UserVouchersParametersGroup;
use SDK\Services\Parameters\Groups\User\VerifyParametersGroup;
use SDK\Services\UserTraits\AddressTrait;
use SDK\Services\UserTraits\NewsletterTrait;
use SDK\Services\UserTraits\SaveForLaterListRowsTrait;
use SDK\Services\UserTraits\ShoppingListsTrait;
use SDK\Services\UserTraits\StockAlertsTrait;
use SDK\Services\UserTraits\SubscriptionsTrait;
use SDK\Services\UserTraits\WishlistTrait;

/**
 * This is the user service class.
 * This class will retrieve the users from LogiCommerce API and transform them to objects.
 * All the needed users operations previous to Framework must be done here.
 *
 * Splitted on traits to divide the methods between them.
 *
 * @see UserService::getUser()
 * @see UserService::updateUser()
 * @see UserService::createUser()
 * @see UserService::deleteUser()
 * @see UserService::login()
 * @see UserService::logout()
 * @see UserService::getOrders()
 * @see UserService::getRMAs()
 * @see UserService::updatePassword()
 * @see UserService::recoverPassword()
 * @see UserService::validateRecoverPasswordHash()
 * @see UserService::setNewPassword()
 * @see UserService::verify()
 * @see UserService::resendVerification()
 * @see UserService::getRelatedItems()
 * @see UserService::getCustomTags()
 * @see UserService::getOauth()
 * @see UserService::salesAgentLogin()
 * @see UserService::salesAgentLogout()
 * @see UserService::getSalesAgentCustomers()
 * @see UserService::getSalesAgentOrders()
 * @see UserService::getSalesAgentSales()
 * @see UserService::getRewardPoints()
 * @see UserService::getUserExists()
 * @see UserService::getVouchers()
 * @see User
 * @see UserOrder
 * @see RelatedItems
 * @see CustomTag
 *
 * @see UserService::addGetUser()
 * @see UserService::addGetOrders()
 * @see UserService::addGetRMAs()
 * @see UserService::addGetRelatedItems()
 * @see UserService::addGetCustomTags()
 * @see UserService::addGetUserExists()
 * @see UserService::addGetRewardPoints()
 * @see UserService::addGetVouchers()
 * @see UserService::addSalesAgentCustomers()
 * @see UserService::addSalesAgentOrders()
 * @see UserService::addSalesAgentSales()
 *  
 * @see BatchRequests
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
 * @see NewsletterTrait::subscribe()
 * @see NewsletterTrait::unsubscribe()
 *
 * @see StockAlertsTrait::getStockAlerts()
 * @see StockAlertsTrait::deleteStockAlerts()
 * @see UserStockAlert
 *
 * @see StockAlertsTrait::addGetStockAlerts()
 * @see BatchRequests
 *
 * @see WishlistTrait::getWishlist()
 * @see WishlistTrait::addWishlistProduct()
 * @see WishlistTrait::deleteWishlistProduct()
 * @see WishlistTrait::sendWishlist()
 * @see Product
 *
 * @see WishlistTrait::addGetWishlist()
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 * @uses AddressTrait
 * @see AddressTrait
 * @uses NewsletterTrait
 * @see NewsletterTrait
 * @uses StockAlertsTrait
 * @see StockAlertsTrait
 * @uses WishlistTrait
 * @see WishlistTrait
 * @uses ShoppingListsTrait
 * @see ShoppingListsTrait
 * @uses SaveForLaterListRowsTrait
 * @see SaveForLaterListRowsTrait
 * @uses SubscriptionsTrait
 *
 * @package SDK\Services
 */
class UserService extends Service {
    use ServiceTrait, AddressTrait, NewsletterTrait, StockAlertsTrait, WishlistTrait, ShoppingListsTrait, SaveForLaterListRowsTrait, SubscriptionsTrait;

    private const REGISTRY_KEY = Registry::USER_MODEL;

    /**
     * Returns the current user information.
     *
     * @return User|NULL
     * deprecated accountService->getSession
     */
    public function getUser(): ?User {
        if (!Application::getInstance()->getEcommerceSettings()->getAccountRegisteredUsersSettings()->getCardinalityPlus()) {
            return $this->getResourceElement(User::class, Resource::USER);
        } else {
            $ret = $this->prepareElement(
                $this->call((new RequestBuilder())->path(Resource::SESSION)->build()),
                Basket::class
            );
            return $ret?->getBasketUser()?->getUser();
        }
    }

    /**
     * Update the current user information.
     *
     * @param UpdateUserParametersGroup $data
     * @param string $dataValidatior
     *            Data validatior PId to apply
     *
     * @return Basket|NULL
     * deprecated
     */
    public function updateUser(UpdateUserParametersGroup $data = null, string $dataValidatior = ''): ?Basket {
        if (!Application::getInstance()->getEcommerceSettings()->getAccountRegisteredUsersSettings()->getCardinalityPlus()) {
            return $this->modifyUser($data, $dataValidatior);
        } else {
            $accountParams = UserToAccountFactory::mapUpdateUserToUpdateAccount($data);
            return $this->prepareElement(
                $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_WITH_ID, ['idUsed' => AccountKey::USED]))->method(self::PUT)
                    ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                    ->body($accountParams)->build()),
                Basket::class
            );
        }
    }

    /**
     * Create the current user information.
     *
     * @param CreateUserParametersGroup $data
     * @param string $dataValidatior
     *            Data validatior PId to apply
     *
     * @return Basket|NULL
     * deprecated
     */
    public function createUser(CreateUserParametersGroup $data = null, string $dataValidatior = ''): ?Basket {
        if (!Application::getInstance()->getEcommerceSettings()->getAccountRegisteredUsersSettings()->getCardinalityPlus()) {
            return $this->modifyUser($data, $dataValidatior);
        } else {
            if (isset($data->toArray()['createAccount']) && $data->toArray()['createAccount'] == true) {
                $accountParams = UserToAccountFactory::mapCreateUserToCreateAccount($data);
                return $this->prepareElement(
                    $this->call((new RequestBuilder())->path(Resource::ACCOUNTS)->method(self::POST)
                        ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                        ->body($accountParams)->build()),
                    Basket::class
                );
            } else {
                $accountParams = UserToAccountFactory::mapCreateUserToUpdateOmsBasketCustomer($data);
                return $this->prepareElement(
                    $this->call((new RequestBuilder())->path(Resource::BASKET_CUSTOMER)->method(self::PUT)
                        ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                        ->body($accountParams)->build()),
                    Basket::class
                );
            }
        }
    }

    private function modifyUser(?UserParametersGroup $data, string $dataValidatior = ''): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::USER)->method(self::POST)
                ->headers(strlen($dataValidatior) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidatior] : [])
                ->body($data)->build()),
            Basket::class
        );
    }

    /**
     * Delete the current user.
     *
     * @param string $password
     *
     * @return Basket|NULL
     * deprecated use AccountService::deleteAccount instead
     */
    public function deleteUser(string $password): ?Basket {
        $data = new DeleteAccountParametersGroup();
        $data->setPassword($password);

        $response = $this->call(
            (new RequestBuilder())
                ->path($this->replaceWildcards(Resource::ACCOUNTS_DELETE, ['idUsed' => AccountKey::USED]))
                ->method(self::POST)
                ->body($data)->build()
        );
        if (isset($response['httpStatus']['code']) && $response['httpStatus']['code'] == 202) {
            $basket = new Basket(["error" => [
                'message' => "A verification email has been sent to the account master. Deletion will remain pending until confirmation is received",
                'code' => "A01000-ACCOUNT_MASTER_DELETE_VERIFICATION_SENT",
                'status' => "204",
            ]]);
        } else if (isset($response['httpStatus']['code']) && $response['httpStatus']['code'] == 204) {
            $basket = $this->prepareElement(
                $this->call((new RequestBuilder())->path(Resource::SESSION)->build()),
                Basket::class
            );
        } else {
            $basket = $this->prepareElement(
                $response,
                Basket::class
            );
        }
        return $basket;
    }

    /**
     * User login
     *
     * @param LoginParametersGroup $data
     *            object that contains username & password
     *
     * @return Basket|NULL
     */
    public function login(LoginParametersGroup $data = null): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::LOGIN)->method(self::POST)->body($data)->build()),
            Basket::class
        );
    }

    /**
     * User logout
     *
     * @return Basket|NULL
     */
    public function logout(): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::LOGOUT)->method(self::POST)->build()),
            Basket::class
        );
    }


    /**
     * Returns the orders filtered with the given parameters for the current user
     *
     * @param OrderParametersGroup $params
     *            object with the needed filters to send to the API user orders resource
     *
     * @return ElementCollection|NULL
     * deprecated
     */
    public function getOrders(OrderParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(UserOrder::class, Resource::USER_ORDERS, $params);
    }

    /**
     * Returns the RMAs for the current user
     *
     * @return ElementCollection|NULL
     */
    public function getRMAs(): ?ElementCollection {
        return $this->getElement(UserRMA::class, Resource::ACCOUNTS_RMAS);
    }

    /**
     * Update the current user password.
     *
     * @param UpdatePasswordParametersGroup $data
     *            object that contains password & new password
     *
     * @return Status|NULL
     */
    public function updatePassword(UpdatePasswordParametersGroup $data = null): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::USER_PASSWORD)->method(self::PUT)->body($data)->build()),
            Status::class
        );
    }

    /**
     * Recover the current user password (this will send an email to recover the password).
     *
     * @param string $email
     *
     * @return Status|NULL
     */
    public function recoverPassword(string $email): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::USER_PASSWORD_RECOVER)->method(self::POST)->body($this->getRecoverPasswordParams($email))
                    ->build()
            ),
            Status::class
        );
    }

    private function getRecoverPasswordParams(string $email): RecoverPasswordParametersGroup {
        $params = new RecoverPasswordParametersGroup();
        $params->setEmail($email);
        return $params;
    }

    /**
     * Validate if the given token stills valid
     *
     * @param string $hash
     *
     * @return Status|NULL
     */
    public function validateRecoverPasswordHash(string $hash): ?Status {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::USER_PASSWORD_HASH_VALIDATE)->pathParams(['hash' => $hash])->build()),
            Status::class
        );
    }

    /**
     * Change the user password (the action is done with the hash inside de received email).
     *
     * @param string $password
     * @param string $hash
     *
     * @return Status|NULL
     */
    public function setNewPassword(string $password, string $hash): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::USER_PASSWORD_HASH)->method(self::PUT)->body($this->getSetNewPasswordParams($password, $hash))
                    ->build()
            ),
            Status::class
        );
    }

    private function getSetNewPasswordParams(string $password, string $hash): SetNewPasswordParametersGroup {
        $params = new SetNewPasswordParametersGroup();
        $params->setPassword($password);
        $params->setHash($hash);
        return $params;
    }

    /**
     * Verify the user that matches the given uniqueId.
     *
     * @param string $uniqueId
     *
     * @return Status|NULL
     */
    public function verify(string $uniqueId): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::ACCOUNTS_VERIFY_UNIQUEID)->method(self::POST)->body($this->getVerifyParams($uniqueId))
                    ->build()
            ),
            Status::class
        );
    }

    private function getVerifyParams(string $uniqueId): VerifyParametersGroup {
        $params = new VerifyParametersGroup();
        $params->setUniqueId($uniqueId);
        return $params;
    }

    /**
     * Resend the verification userIdentifier.
     *
     * @param string $userIdentifier
     *
     * @return Status|NULL
     */
    public function resendVerification(string $userIdentifier): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())
                    ->path(Resource::ACCOUNTS_VERIFY_RESEND)->method(self::POST)->body(['masterIdentifier' => $userIdentifier])
                    ->build()
            ),
            Status::class
        );
    }

    /**
     * Returns the user related items
     *
     * @param string $type
     *            Optional. This param will set the kind of related we want to retrieve. Valid values are inside RelatedItemsType class.
     *            If not given all the related items will be returned inside the RelatedItems object.
     * @param RelatedItemsParametersGroup $params
     *
     * @return ElementCollection|NULL
     */
    public function getRelatedItems(string $type = '', RelatedItemsParametersGroup $params = null): ?ElementCollection {
        return $this->getResponse(
            ['items' => $this->getConnection()->doRequest(
                (new RequestBuilder())
                    ->path($this->getRelatedItemsResource($type))->pathParams(['type' => strtolower($type)])->urlParams($params)
                    ->build()
            )],
            RelatedItems::class
        );
    }

    /**
     * Returns the custom tags filtered with the given parameters for the current user
     *
     * @param CustomTagsParametersGroup $params
     *            object with the needed filters to send to the API user resource
     *
     * @return ElementCollection|NULL
     */
    public function getCustomTags(CustomTagsParametersGroup $params = new UserCustomTagsParametersGroup()): ?ElementCollection {
        return $this->getElements(CustomTag::class, Resource::CUSTOM_TAGS, $params);
    }

    /**
     * Returns the current user information.
     *
     * @param string $plugin
     * 
     * @return UserOauthUrl|NULL
     */
    public function getOauth(string $plugin): ?UserOauthUrl {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::USER_OAUTH)->urlParams(['pluginModule' => $plugin])->method(self::GET)->build()
            ),
            UserOauthUrl::class
        );
    }

    /**
     * Returns the current user information.
     *
     * @param string $plugin
     * @param string $code
     *
     * @return UserOauth|NULL
     */
    public function setOauth(string $pluginModule, string $code): ?UserOauth {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::USER_OAUTH)->method(self::POST)->body(['pluginModule' => $pluginModule, 'code' => $code])->build()),
            UserOauth::class
        );
    }

    /**
     * Check if there is a user identified with the given parameter.
     *
     * @param string $userIdentifier
     *            this parameter can match the email or the public id of the user. Depends on the ecommerce settings.
     *
     * @return UserExists|NULL
     */
    public function getUserExists(string $userIdentifier): ?UserExists {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::USER_EXISTS_VALUE)->pathParams(['value' => $userIdentifier])->build()),
            UserExists::class
        );
    }

    /**
     * Returns the reward points filtered with the given parameters for the current user
     *
     * @param RewardPointsParametersGroup $params
     *            object with the needed filters to send to the API user resource
     *
     * @return ElementCollection|NULL
     */
    public function getRewardPoints(RewardPointsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(RewardPointsBalance::class, Resource::ACCOUNTS_REWARD_POINTS, $params);
    }

    /**
     * Returns the vouchers filtered with the given parameters for the current user
     *
     * @param UserVouchersParametersGroup $params
     *            object with the needed filters to send to the API user resource
     *
     * @return ElementCollection|NULL
     */
    public function getVouchers(UserVouchersParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(Voucher::class, Resource::ACCOUNTS_VOUCHERS, $params);
    }

    /**
     * Return current sales agent customers
     *
     * @param SalesAgentCustomersParametersGroup $params
     *            object with the needed filters to send to the API user sales agent customers resource
     *
     * @return ElementCollection|NULL
     * deprecated
     */
    public function getSalesAgentCustomers(SalesAgentCustomersParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(SalesAgentCustomerFactory::class, Resource::ACCOUNT_SALES_AGENT_CUSTOMERS, $params);
    }

    /**
     * Return current sales agent sales
     *
     * @param SalesAgentCustomersParametersGroup $params
     *            object with the needed filters to send to the API user sales agent customers resource
     *
     * @return ElementCollection|NULL
     * deprecated
     */
    public function getSalesAgentSales(SalesAgentSalesParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(SalesAgentSales::class, Resource::ACCOUNT_SALES_AGENT_SALES, $params);
    }

    /**
     * For a sales agent, returns the given customer's orders
     *
     * @param int $customerId
     * @param SalesAgentOrdersParametersGroup $params
     *            object with the needed filters to send to the API user sales agent orders resource
     *
     * @return ElementCollection|NULL
     * deprecated
     */
    public function getSalesAgentOrders(int $customerId, SalesAgentOrdersParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(UserOrder::class, $this->replaceWildcards(Resource::ACCOUNT_SALES_AGENT_CUSTOMERS_ID_ORDERS, ['customerId' => $customerId]), $params);
    }

    /**
     * Sales Agent - Login simulated user
     *
     * @param int $customerId
     *
     * @return Basket|NULL
     * deprecated
     */
    public function salesAgentLogin(int $customerId): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNT_SALES_AGENT_LOGIN)->method(self::POST)->body(['customerId' => $customerId])->build()),
            Basket::class
        );
    }

    /**
     * Sales Agent - Logout simulated user
     *
     * @return Basket|NULL
     * deprecated
     */
    public function salesAgentLogout(): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNT_SALES_AGENT_LOGOUT)->method(self::POST)->build()),
            Basket::class
        );
    }

    /**
     * Add the request to get the current user information.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     * deprecated
     */
    public function addGetUser(BatchRequests $batchRequests, string $batchName): void {
        if (!Application::getInstance()->getEcommerceSettings()->getAccountRegisteredUsersSettings()->getCardinalityPlus()) {
            $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::USER)->build());
        } else {
            $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::SESSION)->build(), true);
        }
    }

    /**
     * Add the request to get the orders filtered with the given parameters for the current user
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param OrderParametersGroup $params
     *            object with the needed filters to send to the API user orders resource
     *
     * @return void
     * @deprecated
     */
    public function addGetOrders(BatchRequests $batchRequests, string $batchName, OrderParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_ORDERS)->pathParams(['idUsed' => AccountKey::USED])->urlParams($params)->build(),
            true
        );
    }

    /**
     * Add the request to get returnable products filtered with the given parameters
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetRMAs(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_RMAS)->build()
        );
    }

    /**
     * Add the request to get the user related items
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $type
     *            Optional. This param will set the kind of related we want to retrieve. Valid values are inside RelatedItemsType class.
     *            If not given all the related items will be returned inside the RelatedItems object.
     * @param RelatedItemsParametersGroup $params
     *
     * @return void
     */
    public function addGetRelatedItems(
        BatchRequests $batchRequests,
        string $batchName,
        string $type = '',
        RelatedItemsParametersGroup $params = null
    ): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)
                ->path($this->getRelatedItemsResource($type))
                ->pathParams(['type' => strtolower($type)])
                ->urlParams($params)
                ->build()
        );
    }

    private function getRelatedItemsResource(string $type): string {
        $resource = Resource::ACCOUNTS_RELATED;

        if (strlen(trim($type)) !== 0) {
            if (!RelatedItemsType::isValid($type)) {
                throw new InvalidParameterException(
                    'Invalid value "' . $type . '" for parameter "type"',
                    InvalidParameterException::INVALID_PARAMETER_VALUE
                );
            }
            $resource = Resource::ACCOUNTS_RELATED_TYPE;
        }
        return $resource;
    }

    /**
     * Add the request to get the custom tags filtered with the given parameters for the current user
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param CustomTagsParametersGroup $params
     *            object with the needed filters to send to the API user resource
     *
     * @return void
     */
    public function addGetCustomTags(BatchRequests $batchRequests, string $batchName, CustomTagsParametersGroup $params = new UserCustomTagsParametersGroup()): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::CUSTOM_TAGS)->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get the check that sets if there is a user identified with the given parameter.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $userIdentifier
     *            this parameter can match the email or the public id of the user. Depends on the ecommerce settings.
     *
     * @return UserExists|NULL
     */
    public function addGetUserExists(BatchRequests $batchRequests, string $batchName, string $userIdentifier): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::USER_EXISTS_VALUE)->pathParams(['value' => $userIdentifier])
                ->build()
        );
    }

    /**
     * Add the request to get the reward points filtered with the given parameters for the current user
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param RewardPointsParametersGroup $params
     *            object with the needed filters to send to the API user resource
     *
     * @return void
     */
    public function addGetRewardPoints(BatchRequests $batchRequests, string $batchName, RewardPointsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNTS_REWARD_POINTS)->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get the vouchers filtered with the given parameters for the current user
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param UserVouchersParametersGroup $params
     *            object with the needed filters to send to the API user resource
     *
     * @return void
     */
    public function addGetVouchers(BatchRequests $batchRequests, string $batchName, UserVouchersParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNTS_VOUCHERS)->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get sales agent customers with the given parameters for the current user
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param SalesAgentCustomersParametersGroup $params
     *            object with the needed filters to send to the API user resource
     *
     * @return void
     * deprecated
     */
    public function addGetSalesAgentCustomers(BatchRequests $batchRequests, string $batchName, SalesAgentCustomersParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNT_SALES_AGENT_CUSTOMERS)->urlParams($params)
                ->build(),
            true
        );
    }

    /**
     * Add the request to get the orders filtered with the given parameters for the current user
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $customerId
     * @param SalesAgentCustomersParametersGroup $params
     *
     * @return void
     * deprecated
     */
    public function addGetSalesAgentOrders(BatchRequests $batchRequests, string $batchName, int $customerId, SalesAgentOrdersParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)
                ->path(Resource::ACCOUNT_SALES_AGENT_CUSTOMERS_ID_ORDERS)->pathParams(['customerId' => $customerId])->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the orders filtered with the given parameters for the current user
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param SalesAgentCustomersParametersGroup $params
     *
     * @return void
     * deprecated
     */
    public function addGetSalesAgentSales(BatchRequests $batchRequests, string $batchName, SalesAgentSalesParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNT_SALES_AGENT_SALES)->urlParams($params)
                ->build()
        );
    }
}
