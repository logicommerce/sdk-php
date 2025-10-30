<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Document;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Document\CreateReturnRequestItemParametersValidator;

/**
 * This is the document items parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Document
 */
class CreateReturnRequestItemParametersGroup extends ParametersGroup {

    protected string $hash;

    protected int $quantity;

    protected CreateReturnRequestRmaReasonParametersGroup $rmaReason;

    /**
     * Sets the hash parameter for this parameters group.
     *
     * @param string $hash
     *
     * @return void
     */
    public function setHash(string $hash): void {
        $this->hash = $hash;
    }

    /**
     * Sets the quantity parameter for this parameters group.
     *
     * @param int $quantity
     *
     * @return void
     */
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    /**
     * Sets the RmaReason parameter for this parameters group.
     *
     * @param CreateReturnRequestRmaReasonParametersGroup $rmaReason
     *
     * @return void
     */
    public function setRmaReason(CreateReturnRequestRmaReasonParametersGroup $rmaReason): void {
        $this->rmaReason = $rmaReason;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CreateReturnRequestItemParametersValidator {
        return new CreateReturnRequestItemParametersValidator();
    }
}
