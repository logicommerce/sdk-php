<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Dtos\User\ShoppingListRow;

/**
 * This is the Incidence Shopping List Row Collection class
 *
 * @see IncidenceShoppingListRow::setItem()
 *
 * @see Incidence
 *
 * @package SDK\Core\Dtos
 */
class IncidenceShoppingListRow extends Incidence {

    public function setItem(array $data): void {
        $this->item = new ShoppingListRow($data);
    }
}
