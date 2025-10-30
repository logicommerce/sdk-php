<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\AssetParametersValidator;

/**
 * This is the asset model parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class AssetParametersGroup extends ParametersGroup {

    protected string $routeType;

    protected string $pageType;

    /**
     * Sets the routeType parameter for this parameters group.
     *
     * @param string $routeType
     *
     * @return void
     */
    public function setRouteType(string $routeType): void {
        $this->routeType = $routeType;
    }

    /**
     * Sets the pageType parameter for this parameters group.
     *
     * @param string $pageType
     *
     * @return void
     */
    public function setPageType(string $pageType): void {
        $this->pageType = $pageType;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AssetParametersValidator {
        return new AssetParametersValidator();
    }
}
