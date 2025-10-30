<?php

namespace SDK\Dtos\Catalog;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;

/**
 * This is the Form Field class.
 * The information of API form fields will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see FormField::getType()
 * @see FormField::getRequired()
 * @see FormField::getRegularExpression()
 *
 * @see ElementTrait
 * @see ElementNameTrait
 *
 * @package SDK\Dtos\Catalog
 */
class FormField {
    use ElementTrait, ElementNameTrait;

    protected const ENUMS_NAMESPACE = 'SDK\\Enums\\';

    protected const ENUM_TYPE = 'list';

    protected string $type = '';

    protected bool $required = false;

    protected string $regularExpression = '';

    protected array $valueList = [];

    /**
     * Returns the form field type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    protected function setType(string $type): void {
        $this->type = $type;
        $this->setValueList();
    }

    /**
     * Returns if the form field is required or not.
     *
     * @return bool
     */
    public function getRequired(): bool {
        return $this->required;
    }

    /**
     * Returns the regular expression that the form field has to match to validate.
     *
     * @return string
     */
    public function getRegularExpression(): string {
        return $this->regularExpression;
    }

    protected function setValueList(): void {
        $class = self::ENUMS_NAMESPACE . str_replace('_', '', ucwords(strtolower(ucfirst($this->type)), '_'));
        if (class_exists($class)) {
            $this->valueList = array_keys($class::getValues());
            $this->type = self::ENUM_TYPE;
        }
    }

    /**
     * Returns the valid list of values if exists. Otherwise return an empty array.
     *
     * @return string
     */
    public function getValueList(): array {
        return $this->regularExpression;
    }
}
