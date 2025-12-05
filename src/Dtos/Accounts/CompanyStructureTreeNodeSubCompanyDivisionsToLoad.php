<?php

namespace SDK\Dtos\Accounts;

/**
 * This is the company structure tree node sub company divisions to load main class.
 * The company structure tree node sub company divisions to load information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CompanyStructureTreeNodeSubCompanyDivisionsToLoad::getHasSubCompanyDivisionsToLoad()
 *
 * @see BaseCompanyStructureTreeNode
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
