<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Resources\Date;

/**
 * This is the date added elements trait.
 *
 * @see DateAddedTrait::getDateAdded()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait DateAddedTrait {

    protected ?Date $dateAdded = null;

    /**
     * Returns the date when the element was added.
     *
     * @return Date|NULL
     */
    public function getDateAdded(): ?Date {
        return $this->dateAdded;
    }

    protected function setDateAdded(string $dateAdded): void {
        $this->dateAdded = Date::create($dateAdded);
    }
}
