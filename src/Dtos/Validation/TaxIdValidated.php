<?php

namespace SDK\Dtos\Validation;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Enums\ValidationResult;

/**
 * This is the TaxIdValidated main class.
 * The TaxIdValidated information will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see TaxIdValidated::getStatus()
 * @see TaxIdValidated::getValid()
 * @see TaxIdValidated::isInvalid()
 * @see TaxIdValidated::getProcessedAt()
 * @see TaxIdValidated::getMessages()
 * @see TaxIdValidated::getTaxIdInformation()
 *
 * @see Element
 *
 * @uses ElementTrait
 *
 * @package SDK\Dtos\Validation
 */
class TaxIdValidated extends Element {
    use ElementTrait;

    protected string $status = '';

    protected $processedAt = null;

    protected array $messages = [];

    protected ?TaxIdInformation $taxIdInformation = null;

    /**
     * Returns the validation result status.
     *
     * @see ValidationResult
     *
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * Indicates whether the taxId has been validated successfully.
     *
     * @return bool
     */
    public function getValid(): bool {
        return $this->status === ValidationResult::VALID;
    }

    /**
     * Indicates whether the taxId is invalid. Any other status (skipped, unsupported, error, ...)
     * is not considered invalid so it should not block the checkout.
     *
     * @return bool
     */
    public function isInvalid(): bool {
        return $this->status === ValidationResult::INVALID;
    }

    /**
     * Returns the moment the validation was processed at.
     *
     * @return mixed
     */
    public function getProcessedAt(): mixed {
        return $this->processedAt;
    }

    /**
     * Returns the messages value
     *
     * @return TaxIdValidatedMessage[]
     */
    public function getMessages(): array {
        return $this->messages;
    }

    protected function setMessages(array $messages): void {
        $this->messages = $this->setArrayField($messages, TaxIdValidatedMessage::class);
    }

    /**
     * Returns the additional taxId information returned by the validator.
     *
     * @return TaxIdInformation|null
     */
    public function getTaxIdInformation(): ?TaxIdInformation {
        return $this->taxIdInformation;
    }

    protected function setTaxIdInformation(array $taxIdInformation): void {
        $this->taxIdInformation = new TaxIdInformation($taxIdInformation);
    }
}
