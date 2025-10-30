<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

/**
 * This is the Incidence Save For Later List Row Collection class
 *
 * @see IncidenceSaveForLaterListRowsCollection::getIncidences()
 *
 * @see ElementCollection
 *
 * @package SDK\Core\Dtos
 */
class IncidenceSaveForLaterListRowsCollection extends ElementCollection {

    protected array $incidences = [];

    /**
     * Returns the incidences.
     *
     * @return IncidenceSaveForLaterListRow[]
     */
    public function getIncidences(): array {
        return $this->incidences;
    }

    protected function setIncidences(array $incidences): void {
        $this->incidences = $this->setArrayField($incidences, IncidenceSaveForLaterListRow::class);
    }
}
