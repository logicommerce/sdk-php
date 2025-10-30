<?php declare(strict_types=1);

namespace SDK\Core\Services\Parameters\Validators\Traits;

/**
 * This is the coordinate parameters validation trait.
 *
 * @package SDK\Core\Services\Parameters\Validators\Traits
 */
trait CoordinateParametersValidatorTrait {

    private static $latitudeRegex = '/^(\+|-)?(?:90(?:(?:\.0{1,14})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,14})?))$/';

    private static $longitudeRegex = '/^(\+|-)?(?:180(?:(?:\.0{1,14})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,14})?))$/';

    protected function validateLatitude($latitude): ?bool {
        if (is_float($latitude) && $this->isValidLatitude($latitude)) {
            return true;
        }
        return null;
    }

    protected function validateLongitude($longitude): ?bool {
        if (is_float($longitude) && $this->isValidLongitude($longitude)) {
            return true;
        }
        return null;
    }

    private function isValidLatitude($latitude): bool {
        return $this->checkCoord(self::$latitudeRegex, $latitude);
    }

    private function isValidLongitude($longitude): bool {
        return $this->checkCoord(self::$longitudeRegex, $longitude);
    }

    private function checkCoord(string $regex, $coord): bool {
        return preg_match($regex, (string)$coord) === 1;
    }
}
