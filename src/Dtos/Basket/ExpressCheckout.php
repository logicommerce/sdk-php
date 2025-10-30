<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the express checkout class.
 * The express checkout information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class ExpressCheckout {
	use ElementTrait;

	protected int $pluginAccountId = 0;

	protected ?ExpressCheckoutCustomer $customer = null;


	/**
	 * Returns the plugin account id.
	 * 
	 * @return int
	 */
	public function getPluginAccountId(): int {
		return $this->pluginAccountId;
	}

	protected function setPluginAccountId(int $pluginAccountId): void {
		$this->pluginAccountId = $pluginAccountId;
	}

	/**
	 * Returns the customer.
	 * 
	 * @return ExpressCheckoutCustomer|NULL
	 */
	public function getCustomer(): ?ExpressCheckoutCustomer {
		return $this->customer;
	}

	protected function setCustomer(array $customer): void {
		$this->customer = new ExpressCheckoutCustomer($customer);
	}

}