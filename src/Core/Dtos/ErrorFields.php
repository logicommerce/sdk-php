<?php
namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the Error Fields class.
 * The API Error Fields data will be stored in that class and will remain immutable (only get methods are prevision)
 *
 * @see ErrorField::getName()
 * @see ErrorField::getType()
 * @see ErrorField::getAdditionalInformation()
 *
 * @package SDK\Core\Dtos
 */
class ErrorFields {
    use ElementTrait;

    protected array $items = [];

   /**
     * Returns the elements on the collection.
     *
     * @return ErrorField[]
     */
    public function getItems(): array {
        return $this->items;
    }

}
