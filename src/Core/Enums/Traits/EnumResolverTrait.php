<?php

namespace SDK\Core\Enums\Traits;

/**
 * This is the trait who knows how to get a enum value throw variable name.
 *
 * @package SDK\Core\Enums\Traits
 */
trait EnumResolverTrait {

    private function getEnum(string $class, string $value, $defaultValue) {
        $const = $class . '::' . strtoupper($value);
        return (defined($const)) ? constant($const) : $defaultValue;
    }

    private function getArray(string $class, array $items):array {
        return array_filter($items, function($v) use ($class) { 
            $const = $class . '::' . strtoupper($v);
            return (defined($const));
        });
    }

}
