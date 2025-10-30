<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\LockedStockTimerType;

/**
 * This is the BasketStockLockingSettings class.
 * The BasketStockLockingSettings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BasketStockLockingSettings::getActive()
 * @see BasketStockLockingSettings::getLockedStockTimerType()
 * @see BasketStockLockingSettings::getLockedStockTimerIniLockingMinutes()
 * @see BasketStockLockingSettings::getLockedStockTimerMaxLockingMinutes()
 * @see BasketStockLockingSettings::getLockedStockTimerExtendibleByUser()
 * @see BasketStockLockingSettings::getLockedStockTimerDefaultExtensionMinutes()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Settings
 */
class BasketStockLockingSettings extends Element {
    use ElementTrait, EnumResolverTrait;

    protected bool $active = false;

    protected string $lockedStockTimerType = '';

    protected int $lockedStockTimerIniLockingMinutes = 0;

    protected int $lockedStockTimerMaxLockingMinutes = 0;

    protected bool $lockedStockTimerExtendibleByUser = false;

    protected int $lockedStockTimerDefaultExtensionMinutes = 0;

    /**
     * Specifies whether the LockedStockTimers can be extended by the user.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    protected function setActive(bool $active): void {
        $this->active = $active;
    }

    /**
     * Specifies the considered type for the LockedStockTimers
     *
     * @return string
     */
    public function getLockedStockTimerType(): string {
        return $this->getEnum(LockedStockTimerType::class, $this->lockedStockTimerType, LockedStockTimerType::GLOBAL);
    }

    protected function setLockedStockTimerType(string $lockedStockTimerType): void {
        $this->lockedStockTimerType = $lockedStockTimerType;
    }

    /**
     * Specifies the number of minutes taken into account to stablish the initial expiresAt for a LockingStockTimer.
     *
     * @return int
     */
    public function getLockedStockTimerIniLockingMinutes(): int {
        return $this->lockedStockTimerIniLockingMinutes;
    }

    protected function setLockedStockTimerIniLockingMinutes(int $lockedStockTimerIniLockingMinutes): void {
        $this->lockedStockTimerIniLockingMinutes = $lockedStockTimerIniLockingMinutes;
    }

    /**
     * Specifies the maximum number of minutes taken into account to stablish the expiresAt for a LockingStockTimer. The expiresAt can never exceed this number of minutes from the current moment.
     *
     * @return int
     */
    public function getLockedStockTimerMaxLockingMinutes(): int {
        return $this->lockedStockTimerMaxLockingMinutes;
    }

    protected function setLockedStockTimerMaxLockingMinutes(int $lockedStockTimerMaxLockingMinutes): void {
        $this->lockedStockTimerMaxLockingMinutes = $lockedStockTimerMaxLockingMinutes;
    }

    /**
     * Specifies whether the LockedStockTimers can be extended by the user.
     *
     * @return bool
     */
    public function getLockedStockTimerExtendibleByUser(): bool {
        return $this->lockedStockTimerExtendibleByUser;
    }

    protected function setLockedStockTimerExtendibleByUser(bool $lockedStockTimerExtendibleByUser): void {
        $this->lockedStockTimerExtendibleByUser = $lockedStockTimerExtendibleByUser;
    }

    /**
     * Specifies the default number of minutes for an extension request of a LockingStockTimer.
     *
     * @return int
     */
    public function getLockedStockTimerDefaultExtensionMinutes(): int {
        return $this->lockedStockTimerDefaultExtensionMinutes;
    }

    protected function setLockedStockTimerDefaultExtensionMinutes(int $lockedStockTimerDefaultExtensionMinutes): void {
        $this->lockedStockTimerDefaultExtensionMinutes = $lockedStockTimerDefaultExtensionMinutes;
    }
}
