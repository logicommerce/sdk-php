<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the delivery note document row option class.
 * The delivery note document row options will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DeliveryNoteDocumentRowOption::getValues()
 *
 * @see DocumentRowOption
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
class DeliveryNoteDocumentRowOption extends DocumentRowOption {
    use ElementTrait;

    protected array $values = [];

    /**
     * Returns information about the option values.
     *
     * @return DocumentRowOptionValue[]
     */
    public function getValues(): array {
        return $this->values;
    }

    protected function setValues(array $values): void {
        $this->values = $this->setArrayField($values, DocumentRowOptionValue::class);
    }
}
