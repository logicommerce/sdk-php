<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Incidence class
 *
 * @see Incidence::getItem()
 * @see Incidence::getDetail()
 *
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class Incidence extends Element {
    use ElementTrait;

    protected ?Element $item = null;

    protected ?Detail $detail = null;

    /**
     * Input data of the item that could not be added. It returns the same item's information provided in the request.
     *
     * @return Element
     */
    public function getItem(): ?Element {
        return $this->item;
    }

    public function setItem(array $data): void {
        $this->item = new Element($data);
    }

    /**
     * Incidence cause information.
     *
     * @return float
     */
    public function getDetail(): ?Detail {
        return $this->detail;
    }

    public function setDetail(array $data): void {
        $this->detail = new Detail($data);
    }
}
