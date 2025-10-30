<?php

namespace SDK\Core\Dtos;

/**
 * This is the main factory class.
 * We use this class to check some return types.
 *
 * @see Factory::getElement()
 *
 * @package SDK\Core\Dtos
 */
abstract class Factory {

    /**
     * Returns the needed element.
     *
     * @return Element|NULL
     */
    public abstract static function getElement(array $data = []): ?Element;

    protected static function getItem(array $data = []): ?Element {
        if (empty($data)) {
            $item = null;
        } elseif (!isset($data[static::TYPE]) || strlen($data[static::TYPE]) === 0) {
            $item = self::defaultReturnValue($data);
        } else {
            $class = static::NAMESPACE . '\\' . self::getClassName($data[static::TYPE]);
            if (!class_exists($class)) {
                $item = self::defaultReturnValue($data);
            } else {
                $item = new $class($data);
            }
        }
        return $item;
    }

    protected static function getClassName(string $name): string {
        $className = '';
        if (defined('static::CLASS_PREFIX')) {
            $className .= static::CLASS_PREFIX;
        }
        $className .= static::prepareClassName($name);
        if (defined('static::CLASS_SUFFIX')) {
            $className .= static::CLASS_SUFFIX;
        }
        return $className;
    }

    protected static function defaultReturnValue(array $data): ?Element {
        if (defined('static::DEFAULT_CLASS')) {
            $defaultClass = static::DEFAULT_CLASS;
            return new $defaultClass($data);
        }
        return null;
    }

    protected static function prepareClassName(string $name): string {
        $separator = '_';
        if (defined('static::CLASS_SEPARATOR')) {
            $separator = static::CLASS_SEPARATOR;
        }
        return str_replace($separator, '', ucwords(strtolower($name), $separator));
    }
}
