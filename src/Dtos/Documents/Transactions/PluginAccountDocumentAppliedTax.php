<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the plugin document applied tax class.
 * The document applied taxes will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PluginAccountDocumentAppliedTax::getTax()
 * @see PluginAccountDocumentAppliedTax::getApplyRe()
 *
 * @see DocumentAppliedTax
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
class PluginAccountDocumentAppliedTax extends DocumentAppliedTax {
    use ElementTrait;

    protected string $code = '';

    protected int $pluginAccountId = 0;

    /**
     * Returns the code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Returns the plugin account id.
     *
     * @return int
     */
    public function getPluginAccountId(): int {
        return $this->pluginAccountId;
    }
}
