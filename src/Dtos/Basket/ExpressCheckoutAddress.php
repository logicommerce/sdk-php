<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\Location;

/**
 * This is the express checkout address class.
 * The express checkout address information will be stored in that class and will remain immutable 
 * (only get methods are available)
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class ExpressCheckoutAddress {
	use ElementTrait;

	protected ?string $name = null;

	protected ?string $address = null;

	protected ?string $addressAdditionalInformation = null;

	protected ?string $number = null;

	protected ?string $city = null;

	protected ?string $state = null;

	protected ?string $postalCode = null;

	protected ?string $mobile = null;

	protected ?string $phone = null;

    protected ?Location $location = null;

	
	/**
	 * Get the name.
	 *
	 * @return string|null The name.
	 */
	public function getName(): ?string {
		return $this->name;
	}

	protected function setName(?string $name): void {
		$this->name = $name;
	}

	/**
	 * Get the address.
	 *
	 * @return string|null The address.
	 */
	public function getAddress(): ?string {
		return $this->address;
	}

	protected function setAddress(?string $address): void {
		$this->address = $address;
	}

	/**
	 * Get the additional address information.
	 *
	 * @return string|null The additional address information.
	 */
	public function getAddressAdditionalInformation(): ?string {
		return $this->addressAdditionalInformation;
	}

	protected function setAddressAdditionalInformation(?string $addressAdditionalInformation): void {
		$this->addressAdditionalInformation = $addressAdditionalInformation;
	}

	/**
	 * Get the number.
	 *
	 * @return string|null The number.
	 */
	public function getNumber(): ?string {
		return $this->number;
	}

	protected function setNumber(?string $number): void {
		$this->number = $number;
	}

	/**
	 * Get the city.
	 *
	 * @return string|null The city.
	 */
	public function getCity(): ?string {
		return $this->city;
	}

	protected function setCity(?string $city): void {
		$this->city = $city;
	}

	/**
	 * Get the state.
	 *
	 * @return string|null The state.
	 */
	public function getState(): ?string {
		return $this->state;
	}

	protected function setState(?string $state): void {
		$this->state = $state;
	}

	/**
	 * Get the postal code.
	 *
	 * @return string|null The postal code.
	 */
	public function getPostalCode(): ?string {
		return $this->postalCode;
	}

	protected function setPostalCode(?string $postalCode): void {
		$this->postalCode = $postalCode;
	}

	/**
	 * Get the mobile number.
	 *
	 * @return string|null The mobile number.
	 */
	public function getMobile(): ?string {
		return $this->mobile;
	}

	protected function setMobile(?string $mobile): void {
		$this->mobile = $mobile;
	}

	/**
	 * Get the phone number.
	 *
	 * @return string|null The phone number.
	 */
	public function getPhone(): ?string {
		return $this->phone;
	}

	protected function setPhone(?string $phone): void {
		$this->phone = $phone;
	}

	/**
	 * Get the location.
	 *
	 * @return Location|null The location.
	 */
	public function getLocation(): ?Location {
		return $this->location;
	}

	protected function setLocation(?array $location): void {
		$this->location = new Location($location);
	}

}