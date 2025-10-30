<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Document;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Document\CreateReturnRequestDeliveryParametersValidator;

/**
 * This is the document items parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Document
 */
class CreateReturnRequestDeliveryParametersGroup extends ParametersGroup {

    protected int $itemId;

    protected string $type;

    /**
     * Sets the itemId parameter for this parameters group.
     *
     * @param int $itemId
     *
     * @return void
     */
    public function setItemId(int $itemId): void {
        $this->itemId = $itemId;
    }

    /**
     * Sets the type parameter for this parameters group.
     *
     * @param string $type
     *
     * @return void
     */
    public function setType(string $type): void {
        $this->type = $type;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CreateReturnRequestDeliveryParametersValidator {
        return new CreateReturnRequestDeliveryParametersValidator();
    }
}
