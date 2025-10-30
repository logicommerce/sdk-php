<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\CoordinateParametersValidator;

/**
 * This is the coordinate parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class CoordinateParametersGroup extends ParametersGroup {

    protected float $latitude;

    protected float $longitude;

    /**
     * Sets the latitude parameter for this parameters group.
     *
     * @param float $latitude
     *
     * @return void
     */
    public function setLatitude(float $latitude): void {
        $this->latitude = $latitude;
    }

    /**
     * Sets the longitude parameter for this parameters group.
     *
     * @param float $longitude
     *
     * @return void
     */
    public function setLongitude(float $longitude): void {
        $this->longitude = $longitude;
    }

    protected function getValidator(): CoordinateParametersValidator {
        return new CoordinateParametersValidator();
    }
}
