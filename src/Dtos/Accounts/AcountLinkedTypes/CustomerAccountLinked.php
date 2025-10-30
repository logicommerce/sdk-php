<?php

namespace SDK\Dtos\Accounts\AcountLinkedTypes;

use SDK\Dtos\Accounts\AccountLinked;

/**
 * Represents a customer account linked.
 *
 * @see AccountLinked
 */
class CustomerAccountLinked extends AccountLinked {

	protected bool $accountLinked = true;
	protected int $accountId = 0;
	protected int $selectedInvoicingAddressId = 0;
	protected int $selectedShippingAddressId = 0;

	function isAccountLinked(): bool {
		return $this->accountLinked;
	}

	/**
	 * Returns the account id.
	 *
	 * @return int
	 */
	public function getAccountId(): int {
		return $this->accountId;
	}

	/**
	 * Returns the selected invoicing address id.
	 *
	 * @return int
	 */
	public function getSelectedInvoicingAddressId(): int {
		return $this->selectedInvoicingAddressId;
	}

	public function setSelectedInvoicingAddressId(int $selectedInvoicingAddressId): void {
		$this->selectedInvoicingAddressId = $selectedInvoicingAddressId;
	}

	/**
	 * Returns the selected shipping address id.
	 *
	 * @return int
	 */
	public function getSelectedShippingAddressId(): int {
		return $this->selectedShippingAddressId;
	}

	public function setSelectedShippingAddressId(int $selectedShippingAddressId): void {
		$this->selectedShippingAddressId = $selectedShippingAddressId;
	}
}