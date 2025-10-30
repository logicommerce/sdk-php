<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\SessionUsageModeType;

/**
 * Session usage mode container class.
 * 
 * The session usage mode information will be stored in that class and will remain 
 * immutable (only get methods are available).
 *
 * @see SessionUsageMode::getType()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Basket
 */
abstract class SessionUsageMode extends Element {
	use ElementTrait;

	protected SessionUsageModeType $type = SessionUsageModeType::USUAL;

	/**
	 * Returns the session usage mode type.
	 *
	 * @return SessionUsageModeType
	 */
	public function getType(): SessionUsageModeType {
		return $this->type;
	}

	protected function setType(string $type): void {
		$this->type = SessionUsageModeType::from($type);
	}

}