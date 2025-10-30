<?php

declare(strict_types=1);

namespace SDK\Core\Dtos;

use SDK\Core\Enums\MethodType;
use SDK\Core\Resources\ApiRequest;
use SDK\Core\Resources\Cookie;

/**
 * This is the Batch Request class.
 * The batch requests to make petitions by HTTP(s) will be prepared throught that class.
 *
 * @see BatchRequest::getName()
 *
 * @see Request
 *
 * @package SDK\Core\Dtos
 */
class BatchRequest extends Request {

    protected string $requestId = '';

    protected array $headers = [];

    protected string $method = MethodType::GET;

    /**
     * Set the basketToken as header if setted
     *
     * @return void
     */
    protected function setBasketToken(): void {
        if (Cookie::exist(ApiRequest::BASKET_TOKEN)) {
            $this->setHeader(ApiRequest::BASKET_TOKEN, [Cookie::get(ApiRequest::BASKET_TOKEN)]);
        }
    }

    /**
     * Set the bofPreview as header if setted
     *
     * @return void
     */
    protected function setBofPreview(): void {
        if (isset($_GET[ApiRequest::BOF_PREVIEW])) {
            $this->setHeader(ApiRequest::BOF_PREVIEW, [strip_tags($_GET[ApiRequest::BOF_PREVIEW])]);
        }
    }

    public function setSmuuid(): void {
        if (Cookie::exist("smuuid")) {
            $this->setHeader("cookie", ["smuuid=" . strip_tags(Cookie::get("smuuid"))]);
        }
    }

    /**
     * Returns the batch request request id.
     *
     * @return string
     */
    public function getRequestId(): string {
        return $this->requestId;
    }

    /**
     * Not allowed to modify method for Batch Requests. Do nothing.
     *
     * @param string $method
     *
     * @return void
     */
    public function setMethod(string $method): void {
    }

    /**
     * Sets the batch request request id.
     *
     * @param string $requestId
     *
     * @return void
     */
    public function setRequestId(string $requestId): void {
        $this->requestId = $requestId;
    }

    public function toArray(): array {
        $this->setBasketToken();
        $this->setBofPreview();
        $this->setSmuuid();
        $request = parent::toArray();
        $request['requestId'] = $this->requestId;
        return $request;
    }
}
