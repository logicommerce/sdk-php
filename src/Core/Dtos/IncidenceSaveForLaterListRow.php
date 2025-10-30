<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Dtos\User\ShoppingListRow;

/**
 * This is the Incidence Save For Later List Row Collection class
 *
 * @see IncidenceSaveForLaterListRow::setItem()
 *
 * @see Incidence
 *
 * @package SDK\Core\Dtos
 */
class IncidenceSaveForLaterListRow extends Incidence {

    public function setItem(array $data): void {
        $this->item = new ShoppingListRow($data);
    }
}
