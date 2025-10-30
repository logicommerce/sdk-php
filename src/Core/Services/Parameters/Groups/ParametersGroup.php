<?php

namespace SDK\Core\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;

/**
 * This is the main parameters group class.
 *
 * @package SDK\Core\Services\Parameters\Groups
 */
abstract class ParametersGroup {

    protected ParametersValidator $validator;

    private bool $formattedDataOutputWithStripTags = true;

    private array $formattedDataOutputWithStripTagsExceptions = [];

    /**
     * Returns the object data on array format.
     *
     * @return array
     */
    public function toArray(): array {
        $params = [];
        $properties = array_keys(get_object_vars($this));
        foreach ($properties as $key) {
            if ($key === 'formattedDataOutputWithStripTags' || $key === 'formattedDataOutputWithStripTagsExceptions' || $this->invalidAttribute($this->$key)) {
                continue;
            }
            $params[$key] = $this->getFormattedData($key, $this->$key);
        }
        $this->validate($params);
        return $this->filter($params);
    }

    private function getFormattedData(string $key, $value) {
        $returnValue = $value;
        if ($returnValue instanceof \DateTime) {
            $returnValue = $returnValue->format(\DateTime::ATOM);
        } elseif ($returnValue instanceof ParametersGroup) {
            $returnValue = $returnValue->toArray();
        } elseif (is_array($returnValue)) {
            $items = [];
            foreach ($returnValue as $innerKey => $innerValue) {
                if (is_numeric($innerKey)) {
                    $items[] = $this->getFormattedData($innerKey, $innerValue);
                } else {
                    $items[$innerKey] = $this->getFormattedData($innerKey, $innerValue);
                }
            }
            $returnValue = $items;
        }
        if ($this->getFormattedDataOutputWithStripTags($key) && is_string($returnValue)) {
            $returnValue = preg_replace("/<([^>]*(<|$))/", "&lt;$1", $returnValue);
            $returnValue = html_entity_decode(strip_tags($returnValue), ENT_NOQUOTES, "UTF-8");
        }
        return $returnValue;
    }

    public function getFormattedDataOutputWithStripTags(string $param): bool {
        if (!empty($this->formattedDataOutputWithStripTagsExceptions) && in_array($param, $this->formattedDataOutputWithStripTagsExceptions)) {
            return false;
        }
        return $this->formattedDataOutputWithStripTags;
    }

    public function setFormattedDataOutputWithStripTags(bool $formattedDataOutputWithStripTags): void {
        $this->formattedDataOutputWithStripTags = $formattedDataOutputWithStripTags;
    }

    public function setFormattedDataOutputWithStripTagsExceptions(array $formattedDataOutputWithStripTagsExceptions): void {
        $this->formattedDataOutputWithStripTagsExceptions = $formattedDataOutputWithStripTagsExceptions;
    }

    private function invalidAttribute($value): bool {
        return is_null($value) || $value instanceof ParametersValidator;
    }

    private function validate(array $params): void {
        if (!empty($params)) {
            $this->getInstantiatedValidator()->validate($params);
        }
    }

    protected function filter(array $params): array {
        return $params;
    }

    protected function getInstantiatedValidator(): ParametersValidator {
        $this->validator ??= $this->getValidator();
        return $this->validator;
    }

    protected abstract function getValidator(): ParametersValidator;
}
