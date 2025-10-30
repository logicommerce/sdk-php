<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Core\Resources\Date;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Core\Services\Parameters\Groups\Traits\SortableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Account\AccountOrderParametersValidator;

/**
 * This is the account model (orders resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Account
 */
class AccountOrderParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait, SortableItemsParametersGroupTrait;

    protected bool $onlyCreatedByMe = true;

    protected string $statusIdList;

    protected bool $includeSubCompanyStructure = true;

    protected string $addedFrom;

    protected string $addedTo;

    /**
     * 
     * Sets a onlyCreatedByMe parameter for this parameters group.
     * 
     * @param bool $onlyCreatedByMe
     *
     * @return void
     */
    public function setOnlyCreatedByMe(bool $onlyCreatedByMe): void {
        $this->onlyCreatedByMe = $onlyCreatedByMe;
    }

    /**
     * 
     * Sets a statusIdList parameter for this parameters group.
     *
     * @param string $statusIdList
     *
     * @return void
     */
    public function setStatusIdList(string $statusIdList): void {
        $this->statusIdList = $statusIdList;
    }

    /**
     * 
     * Sets a includeSubCompanyStructure parameter for this parameters group.
     * 
     * @param bool $includeSubCompanyStructure
     *
     * @return void
     */
    public function setIncludeSubCompanyStructure(bool $includeSubCompanyStructure): void {
        $this->includeSubCompanyStructure = $includeSubCompanyStructure;
    }

    /**
     * Sets a start date for this parameters group.
     *
     * @param \DateTime $addedFrom
     *
     * @return void
     */
    public function setAddedFrom(?\DateTime $addedFrom): void {
        if ($addedFrom !== null) {
            $this->addedFrom = $addedFrom->format(Date::DATETIME_FORMAT);
        } else {
            $this->addedFrom = '';
        }
    }

    /**
     * Sets a end date for this parameters group.
     * 
     * @param \DateTime $addedTo
     *
     * @return void
     */
    public function setAddedTo(?\DateTime $addedTo): void {
        if ($addedTo !== null) {
            $this->addedTo = $addedTo->format(Date::DATETIME_FORMAT);
        } else {
            $this->addedTo = '';
        }
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AccountOrderParametersValidator {
        return new AccountOrderParametersValidator();
    }
}
