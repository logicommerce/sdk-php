<?php

declare(strict_types=1);

namespace SDK\Services;

use SDK\Core\Builders\BatchRequestBuilder;
use SDK\Core\Builders\RequestBuilder;
use SDK\Core\Dtos\AccountOrderCollection;
use SDK\Core\Dtos\ElementCollection;
use SDK\Core\Dtos\Factories\AccountFactory;
use SDK\Core\Dtos\Factories\BaseCompanyStructureTreeNodeFactory;
use SDK\Core\Dtos\Factories\MasterFactory;
use SDK\Core\Dtos\Factories\MasterValFactory;
use SDK\Core\Dtos\Status;
use SDK\Core\Enums\Resource;
use SDK\Core\Registry;
use SDK\Core\Resources\BatchRequests;
use SDK\Core\Services\Service;
use SDK\Core\Services\ServiceTrait;
use SDK\Dtos\Accounts\Account;
use SDK\Dtos\Accounts\AccountOrder;
use SDK\Dtos\Accounts\AccountTypes\CompanyDivision;
use SDK\Dtos\Accounts\CompanyStructureTreeNode;
use SDK\Dtos\Accounts\CustomCompanyRole;
use SDK\Dtos\Accounts\RegisteredUser;
use SDK\Dtos\Accounts\Master;
use SDK\Dtos\Accounts\MasterVal;
use SDK\Dtos\Accounts\RegisteredUserAccount;
use SDK\Dtos\Accounts\RegisteredUserExists;
use SDK\Dtos\Accounts\RegisteredUserSimpleProfile;
use SDK\Dtos\Accounts\SalesAgentCustomerData;
use SDK\Dtos\Basket\Basket;
use SDK\Dtos\Documents\Transactions\Purchases\Order;
use SDK\Dtos\User\SalesAgentSales;
use SDK\Dtos\User\UserOrder;
use SDK\Enums\AccountKey;
use SDK\Services\AccountTraits\AccountAddressTrait;
use SDK\Services\Parameters\Groups\Account\RegisteredUsersMeAccountsParametersGroup;
use SDK\Services\Parameters\Groups\User\SalesAgentCustomersParametersGroup;
use SDK\Services\Parameters\Groups\User\SalesAgentOrdersParametersGroup;
use SDK\Services\Parameters\Groups\User\SalesAgentSalesParametersGroup;
use SDK\Services\Parameters\Groups\Account\AccountOrderParametersGroup;
use SDK\Services\Parameters\Groups\Account\AccountOrdersApprovalDecisionParametersGroup;
use SDK\Services\Parameters\Groups\Account\ApproveAccountRegisteredUserParametersGroup;
use SDK\Services\Parameters\Groups\Account\CreateAccountRegisteredUserParametersGroup;
use SDK\Services\Parameters\Groups\Account\SearchAccountRegisteredUserParametersGroup;
use SDK\Services\Parameters\Groups\Account\AccountRegisteredUsersParametersGroup;
use SDK\Services\Parameters\Groups\Account\AccountRegisteredUsersPendingApprovalParametersGroup;
use SDK\Services\Parameters\Groups\Account\UpdateAccountRegisteredUsersParametersGroup;
use SDK\Services\Parameters\Groups\Account\UpdateAccountParametersGroup;
use SDK\Services\Parameters\Groups\Account\AddCompanyRoleParametersGroup;
use SDK\Services\Parameters\Groups\Account\CompanyDivisionsParametersGroup;
use SDK\Services\Parameters\Groups\Account\CompanyRolesParametersGroup;
use SDK\Services\Parameters\Groups\Account\CompanyStructureParametersGroup;
use SDK\Services\Parameters\Groups\Account\CreateAccountParametersGroup;
use SDK\Services\Parameters\Groups\Account\DeleteAccountParametersGroup;
use SDK\Services\Parameters\Groups\Account\RegisteredUserExistsParametersGroup;
use SDK\Services\Parameters\Groups\Account\UpdateRegisteredUserParametersGroup;
use SDK\Services\Parameters\Groups\Account\UpdateCompanyRoleParametersGroup;

/**
 * This is the account service class.
 * This class will retrieve the accounts from LogiCommerce API and transform them to objects.
 * All the needed accounts operations previous to Framework must be done here.
 *
 * Splitted on traits to divide the methods between them.
 *
 * @see AccountService::getOrders()
 * @see AccountService::getRegisteredUsersMeAccounts()
 * @see AccountService::getSalesAgentCustomers()
 * @see AccountService::getSalesAgentSales()
 * @see AccountService::getSalesAgentOrders()
 * @see AccountService::addGetOrders()
 * @see AccountService::addGetRegisteredUsersMeAccounts()
 * @see AccountService::addGetSalesAgentCustomers()
 * @see AccountService::addGetSalesAgentOrders()
 * @see AccountService::addGetSalesAgentSales()
 * @see AccountService::salesAgentLogin()
 * @see AccountService::salesAgentLogout()
 * @see AccountService::usedAccount()
 * @see AccountService::createCompanyDivisions()
 * 
 * @see BatchRequests
 *
 * @see Service
 *
 * @uses ServiceTrait
 * @see ServiceTrait
 *
 *
 * @package SDK\Services
 */
class AccountService extends Service {
    use ServiceTrait, AccountAddressTrait;

    private const REGISTRY_KEY = Registry::ACCOUNT_MODEL;

    /**
     * Returns the account with the given id
     *
     * @return Account|NULL
     */
    public function getAccounts(string $id): ?Account {
        return $this->getResourceElement(AccountFactory::class, $this->replaceWildcards(Resource::ACCOUNTS_WITH_ID, ['idUsed' => $id]));
    }

    /**
     * Returns the company division with the given parameters for the current account
     *
     * @param int $id
     * 
     * @return CompanyDivision|NULL
     */
    public function getCompanyDivision(int $id): ?CompanyDivision {
        return $this->getElement(CompanyDivision::class, Resource::ACCOUNTS_COMPANY_DIVISIONS, $id);
    }

    /**
     * Returns the company structure filtered with the given parameters for the current account
     *
     * @param string $idUsed
     * @param CompanyStructureParametersGroup $params
     *            object with the needed filters to send to the API account company structure resource
     *
     * @return CompanyStructureTreeNode|NULL
     */
    public function getCompanyStructure(string $idUsed = AccountKey::USED, CompanyStructureParametersGroup $params = null): ?CompanyStructureTreeNode {
        return $this->getResourceElement(BaseCompanyStructureTreeNodeFactory::class, $this->replaceWildcards(Resource::ACCOUNTS_COMPANY_STRUCTURE, ['idUsed' => $idUsed]), $params);
    }

    /**
     * Returns the company roles filtered with the given parameters for the current account
     *
     * @param string $idUsed
     * @param CompanyRolesParametersGroup $params
     *            object with the needed filters to send to the API account company roles resource
     *
     * @return ElementCollection|NULL
     */
    public function getCompanyRoles(string $idUsed = AccountKey::USED, CompanyRolesParametersGroup $params = null): ?ElementCollection {
        return $this->getResourceElement(ElementCollection::class, $this->replaceWildcards(Resource::ACCOUNTS_COMPANY_ROLES, ['idUsed' => $idUsed]), $params);
    }

    /**
     * Returns the company role with the given id
     *
     * @param int $id
     *
     * @return CustomCompanyRole|NULL
     */
    public function getCompanyRole(int $id): ?CustomCompanyRole {
        return $this->getResourceElement(CustomCompanyRole::class, $this->replaceWildcards(Resource::ACCOUNTS_COMPANY_ROLE, ['id' => $id]));
    }

    /**
     * Returns the orders filtered with the given parameters for the current account
     *
     * @param string $idUsed
     * @param AccountOrderParametersGroup $params
     *            object with the needed filters to send to the API account orders resource
     *
     * @return AccountOrderCollection|NULL
     */
    public function getOrders(string $idUsed = AccountKey::USED, AccountOrderParametersGroup $params = null): ?AccountOrderCollection {
        return $this->getElements(AccountOrder::class, $this->replaceWildcards(Resource::ACCOUNTS_ORDERS, ['idUsed' => $idUsed]), $params);
    }

    /**
     * Returns the registered users filtered with the given parameters for the current account
     *
     * @param string $idUsed
     * @param AccountRegisteredUsersParametersGroup $params
     *            object with the needed filters to send to the API registered users resource
     *
     * @return ElementCollection|NULL
     */
    public function getRegisteredUsers(string $idUsed = AccountKey::USED, AccountRegisteredUsersParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(MasterFactory::class, $this->replaceWildcards(Resource::ACCOUNTS_REGISTERED_USERS, ['idUsed' => $idUsed]), $params);
    }

    /**
     * This method will return if a registered user exists or not.
     * 
     * @param RegisteredUserExistsParametersGroup $params
     *            object with the needed filters to send to the API account registered user exists resource
     * 
     * @return RegisteredUserExists|NULL
     */
    public function getRegisteredUsersExists(RegisteredUserExistsParametersGroup $params): ?RegisteredUserExists {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNT_REGISTERED_USERS_EXISTS)->urlParams($params)->build()),
            RegisteredUserExists::class
        );
    }

    /**
     * This method will return if a registered users pending approvalor not.
     *
     * @param string $id
     * @param int $registeredUserId
     * @param AccountRegisteredUsersPendingApprovalParametersGroup $params
     *            object with the needed filters to send to the API account registered users pending approval resource
     * 
     * @return MasterVal|NULL
     */
    public function getRegisteredUsersPendingApproval(string $id, int $registeredUserId, AccountRegisteredUsersPendingApprovalParametersGroup $params = null): ?MasterVal {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNTS_REGISTERED_USERS_WITH_REGISTERED_ID_PENDING_APPROVAL)->pathParams(['id' => $id, 'registeredUserId' => $registeredUserId])->urlParams($params)->build()),
            MasterValFactory::class
        );
    }

    /**
     * This method will return the registered user with the given id.
     * 
     * @return Master|NULL
     */
    public function getRegisteredUsersWithRegisteredId(string $idUsed, int $registeredUserId): ?MasterVal {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNTS_REGISTERED_USERS_WITH_REGISTERED_ID)->pathParams(['idUsed' => $idUsed, 'registeredUserId' => $registeredUserId])->build()),
            MasterValFactory::class
        );
    }

    /**
     * Return current registered users
     * @param string $idUsed
     * @param SearchAccountRegisteredUserParametersGroup $params
     *            object with the needed filters to send to the API registered user update resource
     *
     * @return RegisteredUserSimpleProfile|NULL
     */
    public function getRegisteredUserSearch(string $idUsed = AccountKey::USED, SearchAccountRegisteredUserParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(RegisteredUserSimpleProfile::class, $this->replaceWildcards(Resource::ACCOUNTS_REGISTERED_USERS_SEARCH, ['idUsed' => $idUsed]), $params);
    }

    /**
     * This method will return the current account registered users.
     * 
     * @return RegisteredUser|NULL
     */
    public function getRegisteredUsersMe(): ?RegisteredUser {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNT_REGISTERED_USERS_ME)->build()),
            RegisteredUser::class
        );
    }

    /**
     * This method will return the current account registered users accounts.
     *
     * @param RegisteredUsersMeAccountsParametersGroup $params
     *            object with the needed filters to send to the API account registered users me accounts resource
     *
     * @return ElementCollection|NULL
     */
    public function getRegisteredUsersMeAccounts(RegisteredUsersMeAccountsParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(RegisteredUserAccount::class, Resource::ACCOUNT_REGISTERED_USERS_ME_ACCOUNTS, $params);
    }

    /**
     * Return current sales agent customers
     *
     * @param SalesAgentCustomersParametersGroup $params
     *            object with the needed filters to send to the API account sales agent customers resource
     *
     * @return ElementCollection|NULL
     */
    public function getSalesAgentCustomers(SalesAgentCustomersParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(SalesAgentCustomerData::class, Resource::ACCOUNT_SALES_AGENT_CUSTOMERS, $params);
    }

    /**
     * Return current sales agent sales
     *
     * @param SalesAgentCustomersParametersGroup $params
     *            object with the needed filters to send to the API account sales agent customers resource
     *
     * @return ElementCollection|NULL
     */
    public function getSalesAgentSales(SalesAgentSalesParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(SalesAgentSales::class, Resource::ACCOUNT_SALES_AGENT_SALES, $params);
    }

    /**
     * For a sales agent, returns the given customer's orders
     *
     * @param int $customerId
     * @param SalesAgentOrdersParametersGroup $params
     *            object with the needed filters to send to the API account sales agent orders resource
     *
     * @return ElementCollection|NULL
     */
    public function getSalesAgentOrders(int $customerId, SalesAgentOrdersParametersGroup $params = null): ?ElementCollection {
        return $this->getElements(UserOrder::class, $this->replaceWildcards(Resource::ACCOUNT_SALES_AGENT_CUSTOMERS_ID_ORDERS, ['customerId' => $customerId]), $params);
    }

    /**
     * Return current session
     *
     * @return Basket|NULL
     */
    public function getSession(): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::SESSION)->build()),
            Basket::class
        );
    }

    /**
     * Add the request to get the company structure filtered with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $idUsed
     *
     * @return void
     */
    public function addGetAccounts(BatchRequests $batchRequests, string $batchName, string $idUsed = AccountKey::USED): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_WITH_ID)->pathParams(['idUsed' => $idUsed])->build()
        );
    }

    /**
     * Add the request to get the company roles filtered with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param CompanyRolesParametersGroup $params
     *            object with the needed filters to send to the API account company roles resource
     *
     * @return void
     */
    public function addGetCompanyRoles(BatchRequests $batchRequests, string $batchName, CompanyRolesParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_COMPANY_ROLES)->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the company role filtered with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $id
     *
     * @return void
     */
    public function addGetCompanyRole(BatchRequests $batchRequests, string $batchName, int $id): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_COMPANY_ROLE)->pathParams(['id' => $id])->build()
        );
    }


    /**
     * Add the request to get the company structure filtered with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param CompanyStructureParametersGroup $params
     *            object with the needed filters to send to the API account company structure resource
     * @param string $idUsed
     *
     * @return void
     */
    public function addGetCompanyStructure(BatchRequests $batchRequests, string $batchName, string $idUsed = AccountKey::USED, CompanyStructureParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_COMPANY_STRUCTURE)->pathParams(['idUsed' => $idUsed])->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get the orders filtered with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param AccountOrderParametersGroup $params
     *            object with the needed filters to send to the API account orders resource
     * @param string $idUsed
     *
     * @return void
     */
    public function addGetOrders(BatchRequests $batchRequests, string $batchName, string $idUsed = AccountKey::USED, AccountOrderParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNTS_ORDERS)->pathParams(['idUsed' => $idUsed])->urlParams($params)->build()
        );
    }

    /**
     * Add the request to registered user.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $idUsed
     * @param AccountRegisteredUsersParametersGroup $params
     *            object with the needed filters to send to the API account registered user resource
     * @return void
     */
    public function addGetRegisteredUsers(BatchRequests $batchRequests, string $batchName, string $idUsed = AccountKey::USED, AccountRegisteredUsersParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNTS_REGISTERED_USERS)->pathParams(['idUsed' => $idUsed])->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to check if a registered user exists.
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param RegisteredUserExistsParametersGroup $params
     *            object with the needed filters to send to the API account registered user exists resource
     * @return void
     */
    public function addGetRegisteredUsersExists(BatchRequests $batchRequests, string $batchName, RegisteredUserExistsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNT_REGISTERED_USERS_EXISTS)->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get the registered users search with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $idUsed
     * @param SearchAccountRegisteredUserParametersGroup $params
     *            object with the needed filters to send to the API account registered user exists resource
     * @return void
     */
    public function addGetRegisteredUsersSearch(BatchRequests $batchRequests, string $batchName, string $idUsed = AccountKey::USED, SearchAccountRegisteredUserParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNTS_REGISTERED_USERS_SEARCH)
                ->pathParams(['idUsed' => $idUsed])->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get the current account registered users me accounts
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @return void
     */
    public function addGetRegisteredUsersMe(BatchRequests $batchRequests, string $batchName): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNT_REGISTERED_USERS_ME)
                ->build()
        );
    }

    /**
     * Add the request to get registered users me accounts with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param RegisteredUsersMeAccountsParametersGroup $params
     *            object with the needed filters to send to the API account registered users me accounts resource
     *
     * @return void
     */
    public function addGetRegisteredUsersMeAccounts(BatchRequests $batchRequests, string $batchName, RegisteredUsersMeAccountsParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNT_REGISTERED_USERS_ME_ACCOUNTS)->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get registered users with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $idUsed
     * @param int $registeredUserId
     *
     * @return void
     */
    public function addGetRegisteredUsersWithRegisteredId(BatchRequests $batchRequests, string $batchName, string $idUsed, int $registeredUserId): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNTS_REGISTERED_USERS_WITH_REGISTERED_ID)->pathParams(['idUsed' => $idUsed, 'registeredUserId' => $registeredUserId])
                ->build()
        );
    }

    /**
     * Add the request to get registered users pending approval with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param string $id
     * @param int $registeredUserId
     * @param AccountRegisteredUsersPendingApprovalParametersGroup $params
     *
     * @return void
     */
    public function addGetRegisteredUsersPendingApproval(BatchRequests $batchRequests, string $batchName, string $id, int $registeredUserId, AccountRegisteredUsersPendingApprovalParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNTS_REGISTERED_USERS_WITH_REGISTERED_ID_PENDING_APPROVAL)
                ->pathParams(['id' => $id, 'registeredUserId' => $registeredUserId])
                ->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get sales agent customers with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param SalesAgentCustomersParametersGroup $params
     *            object with the needed filters to send to the API account resource
     *
     * @return void
     */
    public function addGetSalesAgentCustomers(BatchRequests $batchRequests, string $batchName, SalesAgentCustomersParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())
                ->requestId($batchName)->path(Resource::ACCOUNT_SALES_AGENT_CUSTOMERS)->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get sales agent orders with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param int $customerId
     * @param SalesAgentOrdersParametersGroup $params
     *
     * @return void
     */
    public function addGetSalesAgentOrders(BatchRequests $batchRequests, string $batchName, int $customerId, SalesAgentOrdersParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)
                ->path(Resource::ACCOUNT_SALES_AGENT_CUSTOMERS_ID_ORDERS)->pathParams(['customerId' => $customerId])->urlParams($params)->build()
        );
    }

    /**
     * Add the request to get sales agent sales with the given parameters for the current account
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     * @param SalesAgentSalesParametersGroup $params
     *
     * @return void
     */
    public function addGetSalesAgentSales(BatchRequests $batchRequests, string $batchName, SalesAgentSalesParametersGroup $params = null): void {
        $batchRequests->addRequest(
            (new BatchRequestBuilder())->requestId($batchName)->path(Resource::ACCOUNT_SALES_AGENT_SALES)->urlParams($params)
                ->build()
        );
    }

    /**
     * Add the request to get the current session
     *
     * @param BatchRequests $batchRequests
     * @param string $batchName
     *            the name that will identify the request on the batch return.
     *
     * @return void
     */
    public function addGetSession(BatchRequests $batchRequests, string $batchName, bool $isMapping = false): void {
        $batchRequests->addRequest((new BatchRequestBuilder())->requestId($batchName)->path(Resource::SESSION)->build(), $isMapping);
    }

    /**
     * Sales Agent - Login simulated account
     *
     * @param int $customerId
     *
     * @return Basket|NULL
     */
    public function salesAgentLogin(int $customerId): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNT_SALES_AGENT_LOGIN)->method(self::POST)->body(['customerId' => $customerId])->build()),
            Basket::class
        );
    }

    /**
     * Sales Agent - Logout simulated account
     *
     * @return Basket|NULL
     */
    public function salesAgentLogout(): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNT_SALES_AGENT_LOGOUT)->method(self::POST)->build()),
            Basket::class
        );
    }

    /**
     * Used Account - Login account
     *
     * @param int $accountId
     *
     * @return Basket|NULL
     */
    public function usedAccount(int $accountId): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::USED_ACCOUNT)->method(self::PUT)->body(['accountId' => $accountId])->build()),
            Basket::class
        );
    }

    /**
     * Create account
     *
     * @param CreateAccountParametersGroup $data
     * @param string $dataValidator
     *
     * @return Basket|NULL
     */
    public function createAccount(CreateAccountParametersGroup $data, string $dataValidator = ''): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path(Resource::ACCOUNTS)->method(self::POST)
                ->headers(strlen($dataValidator) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidator] : [])
                ->body($data)->build()),
            Basket::class
        );
    }

    /**
     * Create registered user
     *
     * @param string $idUsed
     *            Used account ID
     * @param CreateAccountRegisteredUserParametersGroup $data
     *            object with the needed filters to send to the API registered users resource
     * @param string $dataValidator
     *            Data validatior PId to apply
     *
     * @return Master|NULL
     */
    public function createAccountRegisteredUser(string $idUsed, CreateAccountRegisteredUserParametersGroup $data, string $dataValidator = ''): ?Master {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_REGISTERED_USERS, ['idUsed' => $idUsed]))->method(self::POST)
                ->headers(strlen($dataValidator) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidator] : [])
                ->body($data)->build()),
            MasterFactory::class
        );
    }

    /**
     * Create company divisions
     *
     * @param int $id
     * @param CompanyDivisionsParametersGroup $data
     * @param string $dataValidator
     *            Data validatior PId to apply
     *
     * @return CompanyDivision|NULL
     */
    public function createCompanyDivisions(int $id, CompanyDivisionsParametersGroup $data, string $dataValidator = ''): ?CompanyDivision {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_COMPANY_DIVISIONS, ['id' => $id]))->method(self::POST)
                ->headers(strlen($dataValidator) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidator] : [])
                ->body($data)->build()),
            CompanyDivision::class
        );
    }

    /**
     * Create company role
     *
     * @param string $idUsed
     * @param AddCompanyRoleParametersGroup $data
     *
     * @return CustomCompanyRole|NULL
     */
    public function createCompanyRole(string $idUsed, AddCompanyRoleParametersGroup $data): ?CustomCompanyRole {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_COMPANY_ROLES, ['idUsed' => $idUsed]))->method(self::POST)
                ->body($data)->build()),
            CustomCompanyRole::class
        );
    }

    /**
     * Update used account
     *
     * @param UpdateAccountParametersGroup $data
     *            object with the needed filters to send to the API accounts resource
     * @return Basket|NULL
     */
    public function updateUsedAccount(string $idUsed, UpdateAccountParametersGroup $data,  string $dataValidator = ''): ?Basket {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_WITH_ID, ['idUsed' => $idUsed]))->method(self::PUT)
                ->headers(strlen($dataValidator) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidator] : [])
                ->body($data)->build()),
            Basket::class
        );
    }

    /**
     * Update accounts
     *
     * @param string $idUsed
     *            Used account ID
     * @param UpdateAccountParametersGroup $data
     *            object with the needed filters to send to the API accounts resource
     * @return Account|NULL
     */
    public function updateAccount(string $idUsed, UpdateAccountParametersGroup $data,  string $dataValidator = ''): ?Account {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_WITH_ID, ['idUsed' => $idUsed]))->method(self::PUT)
                ->headers(strlen($dataValidator) ? [FormService::DATA_VALIDATOR_HEADER => $dataValidator] : [])
                ->body($data)->build()),
            AccountFactory::class
        );
    }

    /**
     * Update registered user
     *
     * @param string $idUsed
     *            Used account ID
     * @param int $registeredUserId
     *            Registered user ID
     * @param UpdateAccountRegisteredUsersParametersGroup $data
     *            object with the needed filters to send to the API registered users resource
     * @return MasterVal|NULL
     */
    public function updateAccountRegisteredUser(string $idUsed, int $registeredUserId, UpdateAccountRegisteredUsersParametersGroup $data): ?MasterVal {
        return $this->prepareElement(
            $this->call((new RequestBuilder())
                ->path($this->replaceWildcards(Resource::ACCOUNTS_REGISTERED_USERS_WITH_REGISTERED_ID, ['idUsed' => $idUsed, 'registeredUserId' => $registeredUserId]))
                ->method(self::PUT)
                ->body($data)->build()),
            MasterValFactory::class
        );
    }

    /**
     * Update company role
     *
     * @param int $id
     *            Account ID
     * @param UpdateCompanyRoleParametersGroup $data
     *            object with the needed filters to send to the API accounts resource
     * @return CustomCompanyRole|NULL
     */
    public function updateCompanyRole(int $id, UpdateCompanyRoleParametersGroup $data): ?CustomCompanyRole {
        return $this->prepareElement(
            $this->call((new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_COMPANY_ROLE, ['id' => $id]))->method(self::PUT)
                ->body($data)->build()),
            CustomCompanyRole::class
        );
    }

    /**
     * Update registered user me
     *
     * @param UpdateRegisteredUserParametersGroup $data
     *            object with the needed filters to send to the API registered users resource
     * @return RegisteredUser|NULL
     */
    public function updateRegisteredUserMe(UpdateRegisteredUserParametersGroup $data): ?RegisteredUser {
        return $this->prepareElement(
            $this->call((new RequestBuilder())
                ->path(Resource::ACCOUNT_REGISTERED_USERS_ME)
                ->method(self::PUT)
                ->body($data)->build()),
            RegisteredUser::class
        );
    }

    /**
     * Delete account
     *
     * @param string $idUsed
     *            Used account ID
     * @param DeleteAccountParametersGroup $data
     *            object with the needed filters to send to the API accounts resource
     * @return Basket|NULL
     */
    public function deleteAccount(string $idUsed, DeleteAccountParametersGroup $data): ?Basket {
        $response = $this->call(
            (new RequestBuilder())
                ->path($this->replaceWildcards(Resource::ACCOUNTS_DELETE, ['idUsed' => $idUsed]))
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
     * Delete registered users
     *
     * @param string $idUsed
     *            Used account ID
     * @param int $registeredUserId
     *            Registered user ID
     * 
     * @return Status|NULL
     */
    public function deleteRegisteredUsers(string $idUsed, int $registeredUserId): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ACCOUNTS_REGISTERED_USERS_WITH_REGISTERED_ID)->method(self::DELETE)->pathParams(['idUsed' => $idUsed, 'registeredUserId' => $registeredUserId])->build()
            ),
            Status::class
        );
    }

    /**
     * Delete company role
     *
     * @param int $id
     *            Account ID
     * 
     * @return Status|NULL
     */
    public function deleteCompanyRole(int $id): ?Status {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ACCOUNTS_COMPANY_ROLE)->method(self::DELETE)->pathParams(['id' => $id])->build()
            ),
            Status::class
        );
    }

    /**
     * Approve registered user
     *
     * @param int $id
     *            Account ID
     * @param int $registeredUserId
     *            Registered user ID
     * 
     * @return MasterVal|NULL
     */
    public function approveRegisteredUser(int $id, int $registeredUserId, ApproveAccountRegisteredUserParametersGroup $data): ?MasterVal {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path(Resource::ACCOUNTS_REGISTERED_USERS_APPROVE)->method(self::POST)
                    ->pathParams(['id' => $id, 'registeredUserId' => $registeredUserId])
                    ->body($data)
                    ->build()
            ),
            MasterValFactory::class
        );
    }

    /**
     * Orders approval decision
     *
     * @param AccountOrdersApprovalDecisionParametersGroup $params
     *            object with the needed filters to send to the API account orders resource
     *
     * @return Order|NULL
     */
    public function ordersApprovalDecision(string $orderId, AccountOrdersApprovalDecisionParametersGroup $params): ?Order {
        return $this->prepareElement(
            $this->call(
                (new RequestBuilder())->path($this->replaceWildcards(Resource::ACCOUNTS_ORDERS_APPROVAL_DECISION, ['id' => $orderId]))->method(self::POST)
                    ->body($params)
                    ->build()
            ),
            Order::class
        );
    }
}
