<?php

namespace SDK\Dtos\Basket\SessionModes;

use SDK\Dtos\Accounts\RegisteredUserSimpleProfile;
use SDK\Dtos\Basket\SessionUsageMode;

/**
 * This is the session usage mode class.
 *
 * @package SDK\Dtos\Basket
 *
 * @see SessionUsageMode
 */
class SessionUsageModeSalesAgentSimulation extends SessionUsageMode {

	protected int $simulatedFromAccountId = 0;
	
	protected ?RegisteredUserSimpleProfile $simulatedBySalesAgent = null;

	/**
	 * Returns the simulated from account id.
	 *
	 * @return int
	 */
	public function getSimulatedFromAccountId(): int {
		return $this->simulatedFromAccountId;
	}

	/**
	 * Returns the simulated by sales agent.
	 *
	 * @return RegisteredUserSimpleProfile|NULL
	 */
	public function getSimulatedBySalesAgent(): ?RegisteredUserSimpleProfile {
		return $this->simulatedBySalesAgent;
	}

	protected function setSimulatedBySalesAgent(array $simulatedBySalesAgent): void {
		$this->simulatedBySalesAgent = new RegisteredUserSimpleProfile($simulatedBySalesAgent);
	}

}