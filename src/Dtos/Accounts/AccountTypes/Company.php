<?php

namespace SDK\Dtos\Accounts\AccountTypes;

use SDK\Dtos\Accounts\Account;
use SDK\Enums\AccountType;

/**
 * Account company class.
 * 
 * @see Account
 * @see Company::getDescription()
 * @see Company::getEmail()
 * 
 * @package SDK\Dtos\Accounts
 */
class Company extends Account {

    protected string $description = '';
    protected string $email = '';

    /**
     * Returns the description.
     * 
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    protected function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * Returns the email.
     * 
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    protected function setEmail(string $email): void {
        $this->email = $email;
    }
}
