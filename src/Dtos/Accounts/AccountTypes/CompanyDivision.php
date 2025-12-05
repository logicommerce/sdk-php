<?php

namespace SDK\Dtos\Accounts\AccountTypes;

use SDK\Dtos\Accounts\CompanyStructureHeader;

/**
 * This is the company division account main class.
 * The company division account information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CompanyDivision::getParentAccountId()
 * @see CompanyDivision::getSegmentationInheritanceAccount()
 * @see CompanyDivision::getCompany()
 *
 * @see Company
 * @see CompanyStructureHeader
 *
 * @package SDK\Dtos\Accounts\AccountTypes
 */

class CompanyDivision extends Company {

    protected int $parentAccountId = 0;
    protected ?CompanyStructureHeader $segmentationInheritanceAccount = null;
    protected ?CompanyStructureHeader $company = null;

    /**
     * Returns the parent account id.
     * 
     * @return int
     */
    public function getParentAccountId(): int {
        return $this->parentAccountId;
    }

    protected function setParentAccountId(int $parentAccountId): void {
        $this->parentAccountId = $parentAccountId;
    }

    /**
     * Returns the segmentation inheritance account.
     * 
     * @return CompanyStructureHeader
     */
    public function getSegmentationInheritanceAccount(): ?CompanyStructureHeader {
        return $this->segmentationInheritanceAccount;
    }

    protected function setSegmentationInheritanceAccount(array $segmentationInheritanceAccount): void {
        $this->segmentationInheritanceAccount = new CompanyStructureHeader($segmentationInheritanceAccount);
    }

    /**
     * Returns the company.
     * 
     * @return CompanyStructureHeader
     */
    public function getCompany(): ?CompanyStructureHeader {
        return $this->company;
    }

    protected function setCompany(array $company): void {
        $this->company = new CompanyStructureHeader($company);
    }
}
