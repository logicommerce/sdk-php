<?php

namespace SDK\Dtos\Accounts\AcountLinkedTypes;

use SDK\Core\Dtos\Traits\CdnImageTrait;
use SDK\Dtos\Accounts\AccountLinked;

/**
 * This is the customer not account linked main class.
 * The customer non-linked account information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CustomerNotAccountLinked::isAccountLinked()
 * @see CustomerNotAccountLinked::getPId()
 * @see CustomerNotAccountLinked::getName()
 * @see CustomerNotAccountLinked::getImage()
 *
 * @see AccountLinked
 *
 * @package SDK\Dtos\Accounts\AcountLinkedTypes
 */

class CustomerNotAccountLinked extends AccountLinked {
    use CdnImageTrait;

    protected bool $accountLinked = false;
    protected string $pId = '';
    protected string $name = '';
    protected string $image = '';

    function isAccountLinked(): bool {
        return $this->accountLinked;
    }

    /**
     * Returns the public identifier.
     *
     * @return string
     */
    public function getPId(): string {
        return $this->pId;
    }

    /**
     * Returns the customer name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the image.
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }
}
