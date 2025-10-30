<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the user plugin payment token class.
 * The user plugin payment token will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserPluginPaymentToken::getToken()
 * 
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class UserPluginPaymentToken extends Element {
    use ElementTrait;

    protected string $token = '';

    /**
     * Returns the token.
     *
     * @return string
     */
    public function getToken(): string {
        return $this->token;
    }

}
