<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Dtos\Basket\SessionModes\SessionUsageModeSalesAgentSimulation;
use SDK\Dtos\Basket\SessionModes\SessionUsageModeUsual;
use SDK\Dtos\Basket\SessionUsageMode;
use SDK\Enums\SessionUsageModeType;

/**
 * Factory class to create session usage mode instances.
 * 
 * @package SDK\Dtos\Basket
 */
class SessionUsageModeFactory {

	/**
	 * Creates a session usage mode instance.
	 * 
	 * @param array $data
	 * @return SessionUsageMode|null
	 */
	public static function create(array $data): ?SessionUsageMode {
		if (empty($data) || !isset($data['type'])) {
			return null;
		}
		$type = strtoupper($data['type']);
		$sessionUsageModeType = SessionUsageModeType::tryFrom($type);
		if ($sessionUsageModeType === null) {
			return null;
		}
		return self::createSessionUsageMode($sessionUsageModeType, $data);
	}

	private static function createSessionUsageMode(SessionUsageModeType $type, array $data): SessionUsageMode {
		$result = null;
		match ($type) {
			SessionUsageModeType::USUAL => $result = new SessionUsageModeUsual($data),
			SessionUsageModeType::SALES_AGENT_SIMULATION => $result = new SessionUsageModeSalesAgentSimulation($data),
		};
		return $result;
	}
}