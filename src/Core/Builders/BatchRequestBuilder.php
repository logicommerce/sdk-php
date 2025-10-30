<?php declare(strict_types=1);

namespace SDK\Core\Builders;

use SDK\Core\Dtos\BatchRequest;
use SDK\Core\Dtos\Request;

/**
 * This is the builder to create BatchRequest DTOs.
 *
 * @see BatchRequestBuilder::name()
 * @see BatchRequestBuilder::build()
 *
 * @see Request
 *
 * @package SDK\Core\Builders
 */
class BatchRequestBuilder extends RequestBuilder {

    private ?string $requestId = null;

    /**
     * Sets the requestId.
     *
     * @param string $requestId
     *
     * @return BatchRequestBuilder
     */
    public function requestId(string $requestId): BatchRequestBuilder {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * Returns the created batch request.
     *
     * @return BatchRequest
     */
    public function build(): Request {
        return $this->fillRequest(new BatchRequest());
    }

    protected function fillRequest(Request $request): Request {
        $request = parent::fillRequest($request);
        if (!is_null($this->requestId)) {
            $request->setRequestId($this->requestId);
        }
        return $request;
    }
}
