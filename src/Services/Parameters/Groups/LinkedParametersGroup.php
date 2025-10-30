<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\LinkedParametersValidator;

/**
 * This is the linked parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class LinkedParametersGroup extends ParametersGroup {

    protected int $position;

    protected string $positionList;

    protected string $pId;

    protected int $limit;

    /**
     * Sets the position of the item to be obtained.
     *
     * @param int $position
     *
     * @return void
     */
    public function setPosition(int $position): void {
        $this->position = $position;
    }

    /**
     * Sets the list of positions of the items to be obtained.
     *
     * @param string $positionList
     *
     * @return void
     */
    public function setPositionList(string $positionList): void {
        $this->positionList = $positionList;
    }

    /**
     * Sets the public identifier of the item to be obtained.
     *
     * @param string $pId
     *
     * @return void
     */
    public function setPId(string $pId): void {
        $this->pId = $pId;
    }

    /**
     * Sets the maximum number of items to return, from 1 to 50.
     *
     * @param int $limit
     *
     * @return void
     */
    public function setLimit(int $limit): void {
        $this->limit = $limit;
    }

    protected function getValidator(): LinkedParametersValidator {
        return new LinkedParametersValidator();
    }

}
