<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\ElementCollection;

/** 
 * CompanyStructureTreeNode class.
 * 
 * @package SDK\Dtos\Accounts
 */

class CompanyStructureTreeNode extends BaseCompanyStructureTreeNode {


    protected ?ElementCollection $subCompanyDivisions = null;

    /**
     * Returns the has sub company divisions to load.
     *
     * @return bool
     */
    public function getHasSubCompanyDivisionsToLoad(): bool {
        return false;
    }

    /**
     * Returns the sub company divisions.
     *
     * @return ElementCollection|null
     */
    public function getSubCompanyDivisions(): ?ElementCollection {
        return $this->subCompanyDivisions;
    }
    /**
     * Sets the sub company divisions.
     *
     * @param ElementCollection|null $subCompanyDivisions
     */
    public function setSubCompanyDivisions(ElementCollection $subCompanyDivisions): void {
        $this->subCompanyDivisions = $subCompanyDivisions;
    }
}
