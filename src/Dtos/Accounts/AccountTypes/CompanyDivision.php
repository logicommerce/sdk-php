<?php

namespace SDK\Dtos\Accounts\AccountTypes;

use SDK\Dtos\Accounts\CompanyStructureHeader;
use SDK\Enums\AccountType;

/**
 * Account company division class.
 * 
 * @see AccountCompany
 * @see CompanyDivision::getParentAccountId()
 * @see CompanyDivision::getSegmentationInheritanceAccount()
 * @see CompanyDivision::getCompany()
 * 
 * @package SDK\Dtos\Accounts
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
