<?php

namespace SDK\Dtos\Accounts;

/** 
 * CompanyStructureTreeNodeSubCompanyDivisionsToLoad class.
 * 
 * @package SDK\Dtos\Accounts
 */

class CompanyStructureTreeNodeSubCompanyDivisionsToLoad extends BaseCompanyStructureTreeNode {

    /**
     * Returns the has sub company divisions to load.
     *
     * @return bool
     */
    public function getHasSubCompanyDivisionsToLoad(): bool {
        return true;
    }
}
