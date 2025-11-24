<?php

namespace SDK\Core\Services\Parameters\Validators;

use SDK\Core\Resources\Date;
use SDK\Core\Exceptions\InvalidParameterException;

/**
 * This is the main parameters validation class.
 *
 * @package SDK\Core\Services\Parameters\Validators
 */
abstract class ParametersValidator {

    protected static $params = [];

    /**
     * Throws an exception if some of the given parameters is wrong
     *
     * @param array $params
     *
     * @return void
     * @throws InvalidParameterException
     */
    public function validate(array $params): void {
        static::$params = $params;
        if (defined('static::REQUIRED_PARAMS')) {
            foreach (static::REQUIRED_PARAMS as $param) {
                if (!isset($params[$param])) {
                    throw new InvalidParameterException(
                        'Parameter "' . $param . '" is required on "' . get_class($this) . '" class',
                        InvalidParameterException::PARAMETER_REQUIRED
                    );
                }
            }
        }
        if (defined('static::REQUIRED_VINCULATED_PARAMS')) {
            foreach (static::REQUIRED_VINCULATED_PARAMS as $requiredParam => $vinculated) {
                if (isset($params[$requiredParam]) && !isset($params[$vinculated])) {
                    throw new InvalidParameterException(
                        'Parameter "' . $requiredParam . '" requires the value of "' . $vinculated . '" on "' . get_class($this) . '" class',
                        InvalidParameterException::VINCULATED_PARAMETER_REQUIRED
                    );
                }
            }
        }
        foreach ($params as $paramKey => $paramValue) {
            $method = 'validate' . $paramKey;
            if ($this->methodExists($method)) {
                if (is_null($this->invokeValidation($method, $paramValue))) {
                    throw new InvalidParameterException(
                        'Invalid value "' . $this->getStringValue($paramValue) . '" for parameter "' . $paramKey . '" on ' . get_class($this),
                        InvalidParameterException::INVALID_PARAMETER_VALUE
                    );
                }
            } else {
                throw new InvalidParameterException('Invalid parameter "' . $paramKey . '"', InvalidParameterException::INVALID_PARAMETER);
            }
        }
    }

    /**
     * Determines if the required method exists on the current class
     *
     * @param string $method
     *
     * @return bool
     */
    protected function methodExists(string $method): bool {
        return method_exists($this, $method);
    }

    /**
     * Invokes the needed validation with the given parameters
     *
     * @param string $method
     * @param mixed $paramValue
     *
     * @return bool|NULL
     */
    protected function invokeValidation(string $method, $paramValue): ?bool {
        return $this->{$method}($paramValue);
    }

    private function getStringValue($paramValue): string {
        if (!is_scalar($paramValue)) {
            $paramValue = print_r($paramValue, true);
        } elseif (is_bool($paramValue)) {
            $paramValue = $paramValue ? 'true' : 'false';
        }
        return $paramValue . '';
    }

    protected function validateFloatNumeric($floatNumeric): ?bool {
        if (is_numeric($floatNumeric)) {
            $floatNumeric = filter_var($floatNumeric, FILTER_VALIDATE_FLOAT);
            if ($floatNumeric !== false) {
                return true;
            }
        }
        return null;
    }

    protected function validateNumeric($numeric): ?bool {
        if (is_numeric($numeric)) {
            $numeric = filter_var($numeric, FILTER_VALIDATE_INT);
            if ($numeric !== false) {
                return true;
            }
        }
        return null;
    }

    protected function validatePositiveNumeric($numeric): ?bool {
        if ($this->validateNumeric($numeric) && $numeric > 0) {
            return true;
        }
        return null;
    }

    protected function validatePositiveFloatNumeric($floatNumeric): ?bool {
        if ($this->validateFloatNumeric($floatNumeric) && $floatNumeric > 0) {
            return true;
        }
        return null;
    }

    protected function validateZeroOrPositiveNumeric($numeric): ?bool {
        if ($this->validateNumeric($numeric) && $numeric >= 0) {
            return true;
        }
        return null;
    }

    protected function validateString($string, int $minLength = 1, int $maxLength = PHP_INT_MAX): ?bool {
        if (is_string($string) && strlen(trim($string)) >= $minLength && strlen(trim($string)) <= $maxLength) {
            return true;
        }
        return null;
    }

    protected function validateScalar($scalar): ?bool {
        if (is_scalar($scalar) && strlen(trim($scalar)) > 0) {
            return true;
        }
        return null;
    }

    protected function validateBoolean($bool): ?bool {
        return is_bool($bool) ? filter_var($bool, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : null;
    }

    protected function validateDate($date): ?bool {
        if ($date instanceof \DateTime || $date instanceof Date) {
            return true;
        } elseif (!is_string($date) || is_null(Date::create($date))) {
            return null;
        }
        return true;
    }

    protected function validateArray($array): ?bool {
        if (is_array($array)) {
            return true;
        }
        return null;
    }

    protected function validateAssociativeArray($array): ?bool {
        if (is_null($this->validateArray($array))) {
            return null;
        } elseif (array_keys($array) !== range(0, count($array) - 1)) {
            return true;
        }
        return null;
    }

    protected function validateArrayContains($value, array $values): ?bool {
        if (!is_string($value) || strlen(trim($value)) === 0) {
            return null;
        }
        $values = array_map('strtolower', $values);
        if (in_array(strtolower($value), $values, true)) {
            return true;
        }
        return null;
    }

    protected function validateEnumerateValue($value, string $enum): ?bool {
        if (!is_null($this->validateString($value)) && $enum::isValid($value)) {
            return true;
        }
        return null;
    }

    protected function validateEnumerateValues($values, string $enum): ?bool {
        if (is_string($values)) {
            $values = explode(',', $values);
        }
        if (!is_array($values)) {
            return null;
        } elseif ($enum::areValid($values)) {
            return true;
        }
        return null;
    }

    protected function validateItemsClass($items, string $class): ?bool {
        if (!is_array($items)) {
            return null;
        }
        foreach ($items as $item) {
            if (!$item instanceof $class) {
                return null;
            }
        }
        return true;
    }

    protected function validateNumericList($numericList): ?bool {
        if (!is_string($numericList) || strlen(trim($numericList)) === 0) {
            return null;
        }
        $numbers = explode(',', $numericList);
        foreach ($numbers as $number) {
            $value = $this->validateNumeric($number);
            if (is_null($value)) {
                return null;
            }
        }
        return true;
    }
}
