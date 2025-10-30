<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the Basket Locked Stock Timers class.
 * The Basket Locked Stock Timers of API items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketLockedStockTimers::getUid()
 * @see BasketLockedStockTimers::getType()
 * @see BasketLockedStockTimers::getExpiresAt()
 * @see BasketLockedStockTimers::getBasketProductHashes()
 * 
 * @see Element
 * @see ElementTrait
 *
 * @package SDK\Dtos\Catalog\Basket
 */
class BasketLockedStockTimers extends Element {
    use ElementTrait;

    protected string $uid = '';

    protected string $type = '';

    protected ?Date $expiresAt = null;

    protected array $basketProductHashes = [];

    /**
     * Returns the uid
     *
     * @return string
     */
    public function getUid(): string {
        return $this->uid;
    }
    /**
     * Returns the type
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Returns the expiration Date value.
     *
     * @return Date|NULL
     */
    public function getExpiresAt(): ?Date {
        return $this->expiresAt;
    }

    protected function setExpiresAt(string $expiresAt): void {
        $this->expiresAt = Date::create($expiresAt);
    }

    /**
     * Returns the basket Product Hashes
     *
     * @return array
     */
    public function getBasketProductHashes(): array {
        return $this->basketProductHashes;
    }
}
