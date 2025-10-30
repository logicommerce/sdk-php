<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the user oauth url class.
 * The user oauth url information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see UserOauthUrl::getUrl()
 *
 * @see ElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\User
 */
class UserOauthUrl extends Element {
    use ElementTrait, IntegrableElementTrait;

    protected string $url = '';

    /**
     * Get the oauth url
     *
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }
}
