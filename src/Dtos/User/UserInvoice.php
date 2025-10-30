<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the user invoice main class.
 * The user invoice information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserDocument
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class UserInvoice extends UserDocument {
    use ElementTrait;
}
