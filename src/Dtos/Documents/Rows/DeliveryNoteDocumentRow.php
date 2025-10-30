<?php

namespace SDK\Dtos\Documents\Rows;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\OrderDetailType;

/**
 * This is the delivery note document row class.
 * The delivery note document rows will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DeliveryNoteDocumentRow::getOptions()
 * @see DeliveryNoteDocumentRow::getType()
 *
 * @see DocumentRow
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Documents\Rows
 */
class DeliveryNoteDocumentRow extends DocumentRow {
    use ElementTrait, EnumResolverTrait;

    protected array $options = [];

    protected string $type = '';

    /**
     * Returns information about the product options included in the document detail line.
     *
     * @return DeliveryNoteDocumentRowOption[]
     */
    public function getOptions(): array {
        return $this->options;
    }

    protected function setOptions(array $options): void {
        $this->options = $this->setArrayField($options, DeliveryNoteDocumentRowOption::class);
    }

    /**
     * Returns the document detail line type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(OrderDetailType::class, $this->type, '');
    }
}
