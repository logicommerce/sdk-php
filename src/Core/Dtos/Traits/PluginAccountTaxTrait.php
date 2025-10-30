<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the applied tax trait.
 *
 * @see PluginAccountTaxTrait::getPluginAccountId()
 * @see PluginAccountTaxTrait::getCode()
 *
 * @see TaxTrait
 *
 * @package SDK\Core\Dtos\Traits
 */
trait PluginAccountTaxTrait {
    use TaxTrait;

    protected int $pluginAccountId = 0;

    protected string $code = '';

    /**
     * Returns the plugin account identifier.
     *
     * @return int
     */
    public function getPluginAccountId(): int {
        return $this->pluginAccountId;
    }

    /**
     * Returns the defined code.
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

}
