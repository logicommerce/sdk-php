<?php

namespace SDK\Dtos\Documents\Transactions;

use SDK\Core\Dtos\Traits\ElementTrait;

/**
 * This is the plugin document tax definition class.
 * The document tax definitions will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see PluginAccountDocumentTaxDefinition::getCode()
 * @see PluginAccountDocumentTaxDefinition::getPluginAccountId()
 *
 * @see DocumentTaxDefinition
 * @see ElementTrait
 *
 * @package SDK\Dtos\Documents\Transactions
 */
class PluginAccountDocumentTaxDefinition extends DocumentTaxDefinition {
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
