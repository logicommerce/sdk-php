<?php declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementModuleTrait;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the user plugin payment token collection class.
 * The user plugin payment token will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Element
 * @see ElementTrait
 * @see ElementModuleTrait
 *
 * @package SDK\Dtos\Dtos
 */
class UserPluginPaymentTokenCollection extends ElementCollection {
    use ElementTrait, ElementModuleTrait;

}