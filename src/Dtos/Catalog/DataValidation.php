<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\FormType;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;

/**
 * This is the data validation class.
 * The data validation information of API form will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DataValidation::getFormType()
 * @see DataValidation::getFields()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see IntegrableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Catalog
 */
class DataValidation extends Element {
    use ElementTrait, IdentifiableElementTrait, IntegrableElementTrait, EnumResolverTrait;

    protected string $formType = '';

    protected array $fields = [];

    /**
     * Returns the form type.
     *
     * @return string
     */
    public function getFormType(): string { // ENUM
        return $this->getEnum(FormType::class, $this->formType, FormType::END_ORDER);
    }

    /**
     * Returns the form fields.
     *
     * @return FormField[]
     */
    public function getFields(): array {
        return $this->fields;
    }

    protected function setFields(array $fields): void {
        $this->fields = $this->setArrayField($fields, FormField::class);
    }
}
