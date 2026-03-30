<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\PluginConnectorTypeParametersValidator;

/**
 * This is the plugins connectos type parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class PluginConnectorTypeParametersGroup extends ParametersGroup {

    protected string $connectorType;

    protected ?string $navigationHash;

    protected ?string $countryCode;

    /**
     * Sets the connectorType parameter for this parameters group.
     *
     * @param string $connectorType
     *
     * @return void
     */
    public function setConnectorType(string $connectorType): void {
        $this->connectorType = $connectorType;
    }

    /**
     * Gets the type parameter for this parameters group.
     *
     * @return string
     */
    public function getConnectorType(): string {
        return $this->connectorType;
    }

    /**
     * Gets the countryCode parameter for this parameters group.
     *
     * @return string|null
     */
    public function getCountryCode(): ?string {
        return $this->countryCode;
    }

    /**
     * Sets the countryCode parameter for this parameters group.
     *
     * @param string|null $countryCode
     *
     * @return void
     */
    public function setCountryCode(?string $countryCode): void {
        $this->countryCode = $countryCode;
    }

    /**
     * Sets the navigationHash parameter for this parameters group.
     *
     * @param string $navigationHash
     *
     * @return void
     */
    public function setNavigationHash(?string $navigationHash): void {
        $this->navigationHash = $navigationHash;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): PluginConnectorTypeParametersValidator {
        return new PluginConnectorTypeParametersValidator();
    }
}
