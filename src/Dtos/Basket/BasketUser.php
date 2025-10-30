<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\SalesAgentTrait;
use SDK\Core\Dtos\Traits\UserAdditionalInformationTrait;
use SDK\Dtos\User\User;

/**
 * This is the basket product class.
 * The basket products information will be stored in that class and will remain immutable (only get methods are available)
 * 
 * @deprecated This class is deprecated and will be removed soon.
 *
 * @see BasketUser::getUser()
 *
 * @see ElementTrait
 * @see SalesAgentTrait
 * @see UserAdditionalInformationTrait
 *
 * @package SDK\Dtos\Basket
 */
class BasketUser {
    use ElementTrait, SalesAgentTrait, UserAdditionalInformationTrait;

    protected ?User $user = null;

    /**
     * Returns the user user.
     *
     * @return User|NULL
     */
    public function getUser(): ?User {
        return $this->user;
    }

    protected function setUser(array $user): void {
        $this->user = new User($user);
    }

    public function defineUser(?User $user): void {
        $this->user = $user;
    }

}
