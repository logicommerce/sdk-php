<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Account;

use SDK\Services\Parameters\Validators\Account\UpdateAccountParametersValidator;

class UpdateAccountParametersGroup extends AccountParametersGroup {

    protected ?MasterUpdateParametersGroup $master;

    protected int $parentAccountId;

    protected int $segmentationInheritanceAccountId;

    protected string $description;

    protected string $cache = '';

    /**
     * Sets the master parameter for this parameters group.
     *
     * @param MasterUpdateParametersGroup $master
     *
     * @return void
     */

    public function setMaster(MasterUpdateParametersGroup $master): void {
        $this->master = $master;
    }

    /**
     * Sets the parent account identifier parameter for this parameters group.
     * 
     * @param int $parentAccountId
     * 
     * @return void
     */
    public function setParentAccountId(int $parentAccountId): void {
        $this->parentAccountId = $parentAccountId;
    }

    /**
     * Sets the segmentation inheritance account identifier parameter for this parameters group.
     * 
     * @param int $segmentationInheritanceAccountId
     * 
     * @return void
     */
    public function setSegmentationInheritanceAccountId(int $segmentationInheritanceAccountId): void {
        $this->segmentationInheritanceAccountId = $segmentationInheritanceAccountId;
    }

    /**
     * Sets the description parameter for this parameters group.
     *
     * @param string $description
     *
     * @return void
     */
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    /**
     * Gets the validator for this parameters group.
     *
     * @return UpdateAccountParametersValidator
     */
    protected function getValidator(): UpdateAccountParametersValidator {
        return new UpdateAccountParametersValidator();
    }
}
