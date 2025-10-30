<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\TrackerType;

/**
 * This is the Tracker class.
 * The API Trackers will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Tracker::getType()
 * @see Tracker::getScripts()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Common
 */
class Tracker extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait;

    protected string $type = '';

    protected array $scripts = [];

    /**
     * Returns the tracker type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(TrackerType::class, $this->type, TrackerType::DEFAULT);
    }

    /**
     * Returns the tracker scripts.
     *
     * @return TrackerScript[]
     */
    public function getScripts(): array {
        return $this->scripts;
    }

    protected function setScripts(array $scripts): void {
        $this->scripts = $this->setArrayField($scripts, TrackerScript::class);
    }
}
