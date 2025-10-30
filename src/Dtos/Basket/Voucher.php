<?php

namespace SDK\Dtos\Basket;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Core\Resources\Date;

/**
 * This is the voucher class.
 * The vouchers information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Voucher::getAvailableBalance()
 * @see Voucher::getCode()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 *
 * @package SDK\Dtos\Basket
 */
class Voucher extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait;

    protected float $availableBalance = 0.0;

    protected string $code = '';

    protected ?Date $expirationDate = null;

    /**
     * Returns the voucher available balance.
     *
     * @return float
     */
    public function getAvailableBalance(): float {
        return $this->availableBalance;
    }

    /**
     * Returns the voucher code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns the date when the voucher will expirate.
     *
     * @return Date|NULL
     */
    public function getExpirationDate(): ?Date {
        return $this->expirationDate;
    }

    protected function setExpirationDate(string $expirationDate): void {
        $this->expirationDate = Date::create($expirationDate);
    }
}
