<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\UserAdditionalInformationTrait;

/**
 * This is the user additional information class.
 * The user exists information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserExists::getExists()
 *
 * @see Element
 * @see ElementTrait
 * @see UserAdditionalInformationTrait
 *
 * @package SDK\Dtos\User
 */
class UserAdditionalInformation extends Element {
    use ElementTrait, UserAdditionalInformationTrait;

}
