<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\User;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\User\DeleteShoppingListRowsParametersValidator;

/**
 * This is the delete shopping list rows parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\User
 */
class DeleteShoppingListRowsParametersGroup extends ParametersGroup {

    protected array $productIdList;

    protected array $bundleIdList;

    protected array $rowIdList;

    /**
     * Internal product identifiers. The shopping list rows that references any of these products will be deleted.
     *
     * @param array $productIdList
     *
     * @return void
     */
    public function setProductIdList(array $productIdList): void {
        $this->productIdList = $productIdList;
    }

    /**
     * 	Internal bundle identifiers. The shopping list rows that references any of these bundles will be deleted.
     *
     * @param array $bundleIdList
     *
     * @return void
     */
    public function setBundleIdList(array $bundleIdList): void {
        $this->bundleIdList = $bundleIdList;
    }

    /**
     * 	Internal shopping list rows identifiers. These rows will be deleted from the shopping list.
     *
     * @param array $rowIdList
     *
     * @return void
     */
    public function setRowIdList(array $rowIdList): void {
        $this->rowIdList = $rowIdList;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): DeleteShoppingListRowsParametersValidator {
        return new DeleteShoppingListRowsParametersValidator();
    }
}
