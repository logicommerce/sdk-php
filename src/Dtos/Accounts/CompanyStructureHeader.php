<?php

namespace SDK\Dtos\Accounts;

/**
 * This is the company structure header main class.
 * The company structure header information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CompanyStructureHeader::getDescription()
 * @see CompanyStructureHeader::getEmail()
 *
 * @see AccountHeader
 *
 * @package SDK\Dtos\Accounts
 */
class CompanyStructureHeader extends AccountHeader {

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
