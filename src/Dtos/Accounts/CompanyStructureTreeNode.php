<?php

namespace SDK\Dtos\Accounts;

use SDK\Core\Dtos\ElementCollection;

/**
 * This is the company structure tree node main class.
 * The company structure tree node information will be stored in this class and will remain immutable (only get methods are available).
 *
 * @see CompanyStructureTreeNode::getHasSubCompanyDivisionsToLoad()
 * @see CompanyStructureTreeNode::getSubCompanyDivisions()
 * @see CompanyStructureTreeNode::setSubCompanyDivisions()
 *
 * @see BaseCompanyStructureTreeNode
 * @see ElementCollection
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
