<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

/**
 * This is the Incidence Shopping List Row Collection class
 *
 * @see IncidenceShoppingListRowsCollection::getIncidences()
 *
 * @see ElementCollection
 *
 * @package SDK\Core\Dtos
 */
class IncidenceShoppingListRowsCollection extends ElementCollection {

    protected array $incidences = [];

    /**
     * Returns the incidences.
     *
     * @return IncidenceShoppingListRow[]
     */
    public function getIncidences(): array {
        return $this->incidences;
    }

    protected function setIncidences(array $incidences): void {
        $this->incidences = $this->setArrayField($incidences, IncidenceShoppingListRow::class);
    }
}
