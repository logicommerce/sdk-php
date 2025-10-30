<?php

namespace SDK\Dtos\Accounts;

/**
 * CompanyStructureHeader class.
 * 
 * @see AccountHeader
 * @see CompanyStructureHeader::getDescription()
 * @see CompanyStructureHeader::getEmail()
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