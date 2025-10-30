<?php

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the incidence main class.
 * The incidence information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Incidence::getItem()
 * @see Incidence::getDetail()
 *
 * @see ElementTrait
 *
 * @package SDK\Dtos\User
 */
class Incidence {
    use ElementTrait;

    protected string $item = '';

    protected ?Detail $detail = null;

    /**
     *
     * @return string
     */
    public function getItem(): string {
        return $this->item;
    }

   /**
     *
     * @return NULL|Detail
     */
    public function getDetail(): ?Detail {
        return $this->detail;
    }
    
    protected function setDetail(array $detail): void {
        $this->detail = new Detail($detail);
    }

}