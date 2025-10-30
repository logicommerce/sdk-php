<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the sales agent sales customer class
 *
 * @see SalesAgentSalesCustomer::getUserId()
 * @see SalesAgentSalesCustomer::getEmail()
 * @see SalesAgentSalesCustomer::getFirstName()
 * @see SalesAgentSalesCustomer::getLastName()
 * @see SalesAgentSalesCustomer::getCompany()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class SalesAgentSalesCustomer extends Element {
    use ElementTrait;

    /**@deprecated */
    protected int $userId = 0;

    protected int $accountId = 0;

    protected ?string $email = null;

    protected ?string $firstName = null;

    protected ?string $lastName = null;

    protected ?string $company = null;

    /**
     * Returns the user id
     *
     * @return int
     */
    public function getUserId(): int {
        return $this->userId;
    }

    /**
     * Returns the user id
     *
     * @return int
     */
    public function getAccountId(): int {
        return $this->accountId;
    }

    /**
     * Returns the email value
     *
     * @return string
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * Returns the first name value
     *
     * @return string
     */
    public function getFirstName(): ?string {
        return $this->firstName;
    }

    /**
     * Returns the last name value
     *
     * @return string
     */
    public function getLastName(): ?string {
        return $this->lastName;
    }

    /**
     * Returns company value
     * @return string
     */
    public function getCompany(): ?string {
        return $this->company;
    }
}
