<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * Represents an integer limit in last days.
 * 
 * @see Element
 * @see ElementTrait
 * 
 * @package SDK\Dtos\Accounts
 */
class IntegerLimitInLastDays extends Element {

	use ElementTrait {
		__construct as superConstruct;
	}

	protected int $lastDays = 0;
	protected int $max = 0;

	/**
	 * Returns the last days.
	 * 
	 * @return int
	 */
	public function getLastDays(): int {
		return $this->lastDays;
	}

	protected function setLastDays(int $lastDays): void {
		$this->lastDays = $lastDays;
	}

	/**
	 * Returns the max.
	 * 
	 * @return int
	 */
	public function getMax(): int {
		return $this->max;
	}

	protected function setMax(int $max): void {
		$this->max = $max;
	}
}