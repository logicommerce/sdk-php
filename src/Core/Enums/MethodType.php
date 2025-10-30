<?php

namespace SDK\Core\Enums;

/**
 * This is the user type enumerate.
 *
 * @package SDK\Core\Enums
 */
abstract class MethodType extends Enum {

    public const DELETE = 'DELETE';

    public const GET = 'GET';

    public const POST = 'POST';

    public const PUT = 'PUT';
}
