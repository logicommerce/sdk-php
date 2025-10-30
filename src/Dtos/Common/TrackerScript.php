<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\TrackerAmbience;
use SDK\Enums\TrackerPosition;
use SDK\Enums\TrackerScopeType;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the Tracker Script class.
 * The scripts of the API Trackers will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TrackerScript::getCode()
 * @see TrackerScript::getAmbience()
 * @see TrackerScript::getPosition()
 * @see TrackerScript::getType()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\Common
 */
class TrackerScript {
    use ElementTrait, EnumResolverTrait;

    protected string $code = '';

    protected string $ambience = '';

    protected string $position = '';

    protected string $type = '';

    /**
     * Returns the tracker script code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns the tracker script ambience.
     *
     * @return string
     */
    public function getAmbience(): string { // ENUM
        return $this->getEnum(TrackerAmbience::class, $this->ambience, TrackerAmbience::ALL);
    }

    /**
     * Returns the tracker script position.
     *
     * @return string
     */
    public function getPosition(): string { // ENUM
        return $this->getEnum(TrackerPosition::class, $this->position, TrackerPosition::HEAD_TOP);
    }

    /**
     * Returns the tracker script type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(TrackerScopeType::class, $this->type, TrackerScopeType::CODE);
    }
}
