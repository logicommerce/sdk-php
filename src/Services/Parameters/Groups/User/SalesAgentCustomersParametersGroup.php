<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Resources\Date;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\FromToDateParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\User\SalesAgentCustomersParametersValidator;

/**
 * This is the user model (sales agent customers resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class SalesAgentCustomersParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait, FromToDateParametersGroupTrait;

    protected string $q;

    protected bool $includeSubordinates;

    /**
     * Sets a search query parameter for this parameters group.
     *
     * @param string $q
     *
     * @return void
     */
    public function setQ(string $q): void {
        $this->q = $q;
    }

    /**
     * Sets the includeSubordinates parameter for this parameters group.
     *
     * @param bool $includeSubordinates
     *
     * @return void
     */
    public function setIncludeSubordinates(bool $includeSubordinates): void {
        $this->includeSubordinates = $includeSubordinates;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): SalesAgentCustomersParametersValidator {
        return new SalesAgentCustomersParametersValidator();
    }
}
