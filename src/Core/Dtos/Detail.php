<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Dtos\User\SalesAgentTotals;

/**
 * Incidence cause information.
 *
 * @see Detail::getReference()
 * @see Detail::getStatus()
 * @see Detail::getCode()
 * @see Detail::getStatckTrace()
 * @see Detail::getMessage()
 *
 * @see ElementCollection
 * @see ElementTrait
 *
 * @package SDK\Core\Dtos
 */
class Detail extends ElementCollection {
    use ElementTrait;

    protected string $reference = '';

    protected string $status = '';

    protected string $code = '';

    protected string $statckTrace = '';

    protected string $message = '';

    /**
     * Returns reference value
     *
     * @return string
     */
    public function getReference(): ?string {
        return $this->reference;
    }

    public function setReference(string $reference): void {
        $this->reference = $reference;
    }

    /**
     * Returns status value
     *
     * @return string
     */
    public function getStatus(): ?string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }

    /**
     * Returns code value
     *
     * @return string
     */
    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(string $code): void {
        $this->code = $code;
    }

    /**
     * Returns statckTrace value
     *
     * @return string
     */
    public function getStatckTrace(): ?string {
        return $this->statckTrace;
    }

    public function setStatckTrace(string $statckTrace): void {
        $this->statckTrace = $statckTrace;
    }

    /**
     * Returns message value
     *
     * @return string
     */
    public function getMessage(): ?string {
        return $this->message;
    }

    public function setMessage(string $message): void {
        $this->message = $message;
    }
}
