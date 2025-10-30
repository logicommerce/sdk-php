<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the target trait.
 *
 * @see TargetTrait::getTarget()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait TargetTrait {

    protected string $target = '';

    /**
     * Returns the element target (attribute of <a> HTML entity).
     *
     * @return string
     */
    public function getTarget(): string {
        return $this->target;
    }
}
