<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups;

use SDK\Core\Enums\MimeType;
use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\CustomFormSendMailParametersValidator;

/**
 * This is the form model (send custom form mail resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups
 */
class CustomFormSendMailParametersGroup extends ParametersGroup {

    protected string $to;

    protected array $cc;

    protected array $bcc;

    protected string $subject;

    protected string $body;

    protected string $mailAccountPId;

    protected array $attachments;

    /**
     * Sets the send mail to parameter for this parameters group.
     *
     * @param string $to
     *
     * @return void
     */
    public function setTo(string $to): void {
        $this->to = $to;
    }

    /**
     * Sets the send mail cc parameter for this parameters group.
     *
     * @param array $cc
     *
     * @return void
     */
    public function setCc(array $cc): void {
        $this->cc = $cc;
    }

    /**
     * Sets the send mail bcc parameter for this parameters group.
     *
     * @param array $bcc
     *
     * @return void
     */
    public function setBcc(array $bcc): void {
        $this->bcc = $bcc;
    }

    /**
     * Sets the send mail subject parameter for this parameters group.
     *
     * @param string $subject
     *
     * @return void
     */
    public function setSubject(string $subject): void {
        $this->subject = $subject;
    }

    /**
     * Sets the send mail body parameter for this parameters group.
     *
     * @param string $body
     *
     * @return void
     */
    public function setBody(string $body): void {
        $this->body = $body;
    }

    /**
     * Sets the send mail mailAccountPId parameter for this parameters group.
     *
     * @param string $mailAccountPId
     *
     * @return void
     */
    public function setMailAccountPId(string $mailAccountPId): void {
        $this->mailAccountPId = $mailAccountPId;
    }

    /**
     * Sets an array of attachments as a parameter for this parameters group.
     *
     * @param CustomFormSendMailAttachmentParametersGroup[] $attachments
     *
     * @return void
     */
    public function setAttachments(array $attachments): void {
        $this->attachments = [];
        foreach ($attachments as $attachment) {
            $this->addAttachment($attachment);
        }
    }

    /**
     * Adds a new attachment to the array of attachments for this parameters group.
     *
     * @param CustomFormSendMailAttachmentParametersGroup $attachment
     *
     * @return void
     */
    public function addAttachment(CustomFormSendMailAttachmentParametersGroup $attachment): void {
        $this->attachments ??= [];
        $this->attachments[] = $attachment;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CustomFormSendMailParametersValidator {
        return new CustomFormSendMailParametersValidator();
    }
}
