<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\User\IncidenceDeleteItem;

/**
 * This is the Incidence Save For Later List Row  class
 *
 * @see IncidenceDeleteItem::getIncidences()
 *
 * @see Element
 * 
 * @uses ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class IncidencesDeleteItem extends Element {
    use ElementTrait;

    protected array $incidences = [];

    /**
     * Returns the incidences.
     *
     * @return IncidenceDeleteItem[]
     */
    public function getIncidences(): array {
        return $this->incidences;
    }

    protected function setIncidences(array $incidences): void {
        $this->incidences = $this->setArrayField($incidences, IncidenceDeleteItem::class);
    }
}
