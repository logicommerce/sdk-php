<?php

namespace SDK\Core\Dtos\Traits;

use BackedEnum;
use SDK\Core\Dtos\Factory;
use SDK\Core\Resources\Date;

/**
 * This is the main trait.
 *
 * @see ElementTrait::__construct()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ElementTrait {

    public readonly bool $useElementTrait;

    /**
     * Elements constructor.
     *
     * @param array $data
     *            Array that contains all the values to the object to initialize
     */
    public function __construct(array $data = []) {
        $properties = $this->getObjectProperties($data);
        foreach (array_keys($properties) as $key) {
            if (isset($data[$key])) {
                $method = 'set' . $key;
                if (method_exists($this, $method)) { // Call the $this->set$key() method with $data[$key] as argument
                    $this->{$method}($data[$key]);
                } else {
                    $this->{$key} = $data[$key];
                }
            }
        }
    }

    private function __clone() {
        // Prevent clone elements
    }

    /**
     * Convert an API array of objects to a PHP array of objects.
     *
     * @param array $data
     *            Array that contains all the values to the objects to initialize
     * @param string $class
     *            The PHP class we want the objects to be
     *
     * @return array
     */
    protected function setArrayField(array $data, string $class): array {
        $itemsDTOs = [];
        foreach ($data as $item) {
            $itemsDTOs[] = $this->getFieldItem($item, $class);
        }
        return $itemsDTOs;
    }

    protected function getFieldItem(array $item, string $class): ?object {
        if (is_subclass_of($class, Factory::class, true)) {
            return $class::getElement($item);
        }

        return new $class($item);
    }

    /**
     * Used to allow elements to be serialized.
     *
     * @return array
     */
    public function toArray(): array {
        $arrSerialized = [];
        $properties = $this->getObjectProperties();

        foreach (array_keys($properties) as $key) {
            $arrSerialized[$key] = $this->getFormattedData($this->$key);
        }

        return $arrSerialized;
    }

    protected function getFormattedData($value) {
        $returnValue = $value;
        if ($returnValue instanceof Date) {
            $returnValue = $returnValue->originalFormat();
        } elseif ($value instanceof BackedEnum) {
            $returnValue = $value->value;
        } elseif (is_array($returnValue)) {
            $items = [];
            foreach ($returnValue as $innerKey => $innerValue) {
                if (is_numeric($innerKey)) {
                    $items[] = $this->getFormattedData($innerValue);
                } else {
                    $items[$innerKey] = $this->getFormattedData($innerValue);
                }
            }
            $returnValue = $items;
        } elseif (is_object($value)) {
            $returnValue = $value->toArray();
        }
        return $returnValue;
    }

    /**
     * Allow elements to be serialized.
     * Auto-invoked using "json_encode" function.
     *
     * @return array
     */
    public function jsonSerialize(): array {
        return $this->toArray();
    }

    /**
     * Uses "json_encode" function to return the JSON format of the element.
     * Auto-invoked using echo or concatenations.
     *
     * @return string
     */
    public function __toString(): string {
        return json_encode($this);
    }

    private function getObjectProperties(array $data = []): array {
        $errorKey = 'error';
        $properties = get_object_vars($this);
        // $properties = get_class_vars(self::class); is not exactly the same...

        if (!isset($data[$errorKey]) || empty($data[$errorKey]) || (empty($data) && is_null($this->error))) {
            unset($this->error);
            unset($properties[$errorKey]);
        }
        return $properties;
    }
}
