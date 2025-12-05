<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the account group main class.
 * The account group information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see AccountGroup::getName()
 * @see AccountGroup::getDescription()
 * @see AccountGroup::isDefaultOne()
 * @see AccountGroup::isSystemGroup()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Accounts
 */

class AccountGroup extends Element {
    use IdentifiableElementTrait, IntegrableElementTrait;

    use ElementTrait {
        __construct as superConstruct;
    }

    protected string $name = '';
    protected string $description = '';
    protected bool $defaultOne = false;
    protected bool $systemGroup = false;

    /**
     * Returns the name of the account group.
     * 
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    protected function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * Returns the description of the account group.
     * 
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    protected function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * Returns whether the account group is a default group.
     * 
     * @return bool
     */
    public function isDefaultOne(): bool {
        return $this->defaultOne;
    }

    protected function setDefaultOne(bool $defaultOne): void {
        $this->defaultOne = $defaultOne;
    }

    /**
     * Returns whether the account group is a system group.
     * 
     * @return bool
     */
    public function isSystemGroup(): bool {
        return $this->systemGroup;
    }

    protected function setSystemGroup(bool $systemGroup): void {
        $this->systemGroup = $systemGroup;
    }
}
