<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the blog posts comments mode enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class BlogPostCommentMode extends Enum {

    public const NO_COMMENTS = 'NO_COMMENTS';

    public const ANONYMOUS_AND_REGISTERED_USERS = 'ANONYMOUS_AND_REGISTERED_USERS';

    public const ONLY_REGISTERED_USERS = 'ONLY_REGISTERED_USERS';
}
