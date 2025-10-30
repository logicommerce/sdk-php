<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementDescriptionTrait;
use SDK\Core\Dtos\Traits\ElementModuleTrait;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Core\Resources\Date;
use SDK\Enums\PluginConnectorType;

/**
 * This is the User Plugin class.
 * The API plugins will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Plugin::getDate()
 * @see Plugin::getAuthor()
 * @see Plugin::getVersion()
 * @see Plugin::isActived()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementModuleTrait
 * @see IdentifiableElementTrait
 * @see ElementNameTrait
 * @see ElementDescriptionTrait
 *
 * @package SDK\Dtos\Common
 */
class Plugin extends Element {
    use ElementTrait, ElementModuleTrait, IdentifiableElementTrait, ElementNameTrait, ElementDescriptionTrait, EnumResolverTrait;

    protected string $author = '';

    protected string $pId = '';

    protected string $version = '';

    protected bool $active = false;

    protected bool $multipleAccount = false;

    protected ?Date $date = null;

    protected ?Date $debugEnabled = null;

    protected array $connectors = [];

    /**
     * Returns the date.
     *
     * @return Date|NULL
     */
    public function getDate(): ?Date {
        return $this->date;
    }

    protected function setDate(string $date): void {
        $this->date = Date::create($date);
    }

    /**
     * Returns the debugEnabled.
     *
     * @return Date|NULL
     */
    public function getDebugEnabled(): ?Date {
        return $this->debugEnabled;
    }

    protected function setDebugEnabled(string $debugEnabled): void {
        $this->debugEnabled = Date::create($debugEnabled);
    }

    /**
     * Returns the plugin pId.
     *
     * @return string
     */
    public function getPId(): string {
        return $this->pId;
    }

    /**
     * Returns the plugin author.
     *
     * @return string
     */
    public function getAuthor(): string {
        return $this->author;
    }

    /**
     * Returns the plugin version.
     *
     * @return string
     */
    public function getVersion(): string {
        return $this->version;
    }

    /**
     * Returns if the plugin is actived.
     *
     * @return bool
     */
    public function isActive(): bool {
        return $this->active;
    }

    /**
     * Returns if the plugin is multipleAccount.
     *
     * @return bool
     */
    public function isMultipleAccount(): bool {
        return $this->multipleAccount;
    }

    /**
     * Returns the plugin connectors.
     *
     * @return array
     */
    public function getConnectors(): array {
        return $this->getArray(PluginConnectorType::class, $this->connectors);
    }
}
