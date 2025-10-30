<?php

declare(strict_types=1);

namespace SDK\Dtos\User;

use SDK\Core\Dtos\Incidence;

/**
 * This is the Incidence Save For Later List Row Collection class
 *
 * @see IncidenceDeleteItem::setItem()
 *
 * @see Incidence
 *
 * @package SDK\Core\Dtos
 */
class IncidenceDeleteItem extends Incidence {

    public function setItem(array $item): void {
        $this->item = new ShoppingListRowDeleteItem($item);
    }
}
