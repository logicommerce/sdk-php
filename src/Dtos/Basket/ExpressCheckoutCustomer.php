<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the express checkout customer class.
 * The express checkout customer information will be stored in that class and will remain immutable 
 * (only get methods are available)
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class ExpressCheckoutCustomer {
	use ElementTrait;

	protected ?string $email = null;

	protected ?string $firstName = null;

	protected ?string $lastName = null;

	protected ?ExpressCheckoutAddress $invoicingAddress = null;

	protected ?ExpressCheckoutAddress $shippingAddress = null;

	/**
	 * Returns the email.
	 * 
	 * @return string|NULL
	 */
	public function getEmail(): ?string {
		return $this->email;
	}

	protected function setEmail(string $email): void {
		$this->email = $email;
	}

	/**
	 * Returns the first name.
	 * 
	 * @return string|NULL
	 */
	public function getFirstName(): ?string {
		return $this->firstName;
	}

	protected function setFirstName(string $firstName): void {
		$this->firstName = $firstName;
	}

	/**
	 * Returns the last name.
	 * 
	 * @return string|NULL
	 */
	public function getLastName(): ?string {
		return $this->lastName;
	}

	protected function setLastName(string $lastName): void {
		$this->lastName = $lastName;
	}

	/**
	 * Returns the invoicing address.
	 * 
	 * @return ExpressCheckoutAddress|NULL
	 */
	public function getInvoicingAddress(): ?ExpressCheckoutAddress {
		return $this->invoicingAddress;
	}

	protected function setInvoicingAddress(array $invoicingAddress): void {
		$this->invoicingAddress = new ExpressCheckoutAddress($invoicingAddress);
	}

	/**
	 * Returns the shipping address.
	 * 
	 * @return ExpressCheckoutAddress|NULL
	 */
	public function getShippingAddress(): ?ExpressCheckoutAddress {
		return $this->shippingAddress;
	}

	protected function setShippingAddress(array $shippingAddress): void {
		$this->shippingAddress = new ExpressCheckoutAddress($shippingAddress);
	}
}