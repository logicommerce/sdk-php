<?php

namespace SDK\Dtos;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\PaymentType;
use SDK\Enums\PaymentStatus;

/**
 * This is the pay response class.
 * The pay responses will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Element
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos
 */
class PayResponse extends Element {
    use ElementTrait, EnumResolverTrait;

    protected string $message = '';

    protected string $type = '';

    protected array $data = [];

    protected string $transactionId = '';

    protected string $pluginId = '';

    protected string $pluginModule = '';

    protected string $redirectUri = '';

    protected string $status = 'KO';

    /**
     * Returns the pay response message.
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Returns the pay response type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(PaymentType::class, $this->type, '');
    }

    /**
     * Returns the pay response data on a associative array.
     *
     * @return array
     */
    public function getData(): array {
        return $this->data;
    }

    /**
     * Returns the pay response transaction identifier.
     *
     * @return string
     */
    public function getTransactionId(): string {
        return $this->transactionId;
    }

    /**
     * Returns the pay response plugin Id.
     *
     * @return string
     */
    public function getPluginId(): string {
        return $this->pluginId;
    }

    /**
     * Returns the pay response plugin module.
     *
     * @return string
     */
    public function getPluginModule(): string {
        return $this->pluginModule;
    }

    /**
     * Returns the pay response url for redirect.
     *
     * @return string
     */
    public function getRedirectUri(): string {
        return $this->redirectUri;
    }

    /**
     * Returns the pay response status.
     *
     * @return string
     */
    public function getStatus(): string { // ENUM
        return $this->getEnum(PaymentStatus::class, $this->status, 'KO');
    }
}
