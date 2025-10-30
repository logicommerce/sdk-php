<?php

namespace SDK\Core\Resources;

/**
 * This class will help us with the URL's manipulations.
 *
 * @see Url::encodeParams()
 * @see Url::replaceWildcards()
 *
 * @package SDK\Core\Resources
 */
abstract class Url {

    /**
     * Returns the given parameters url formatted
     *
     * @param array $params
     *
     * @return string
     */
    public static function encodeParams(array $params): string {
        $encodedParams = '';
        if (!empty($params)) {
            $urlParams = '';
            foreach ($params as $key => $value) {
                $urlParams .= self::getEncodedValue($key, $value);
            }
            $encodedParams .= '?' . trim($urlParams, '&');
        }
        return $encodedParams;
    }

    private static function getEncodedValue(string $key, $value): string {
        if (is_bool($value)) {
            return self::getParameter($key, ($value ? 'true' : 'false'));
        } elseif (is_array($value)) {
            $result = '';
            foreach ($value as $currentValue) {
                $result .= self::getParameter($key, $currentValue);
            }
            return $result;
        }
        return self::getParameter($key, $value);
    }

    private static function getParameter(string $key, $value): string {
        return urlencode($key) . '=' . (is_null($value) ? '' : urlencode($value)) . '&';
    }

    /**
     * Replace the resource wildcards with the given associative array values
     *
     * @param string $resource
     * @param array $wildcards
     *
     * @return string
     */
    public static function replaceWildcards(string $resource, array $wildcards): string {
        foreach ($wildcards as $wildcard => $value) {
            $value = is_null($value) ? '' : $value;
            $resource = str_replace('{' . $wildcard . '}', $value, $resource);
        }
        return $resource;
    }
}
