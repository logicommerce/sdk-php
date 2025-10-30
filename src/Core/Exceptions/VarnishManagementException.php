<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed in varnish management class.
 *
 * @package SDK\Core\Exceptions
 */
class VarnishManagementException extends SdkException {

    public const CACHEABLE_AND_TTL_0 = 'F030-V100';

}
