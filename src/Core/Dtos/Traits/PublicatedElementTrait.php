<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Resources\Date;

/**
 * This is the publicated elements trait.
 *
 * @see PublicatedElementTrait::getPublicationDate()
 *
 * @see DateAddedTrait
 *
 * @package SDK\Core\Dtos\Traits
 */
trait PublicatedElementTrait {
    use DateAddedTrait;

    protected ?Date $publicationDate = null;

    /**
     * Returns the date when the element was publicated.
     *
     * @return Date|NULL
     */
    public function getPublicationDate(): ?Date {
        return $this->publicationDate;
    }

    protected function setPublicationDate(string $publicationDate): void {
        $this->publicationDate = Date::create($publicationDate);
    }
}
