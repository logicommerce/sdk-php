<?php

namespace SDK\Enums;

use SDK\Core\Enums\SortableEnum;

/**
 * This is the sort blog post value enumerate.
 *
 * @see SortableEnum
 *
 * @package SDK\Enums
 */
abstract class BlogPostSort extends SortableEnum {

    public const ID = 'ID';

    public const PUBLICATIONDATE = 'PUBLICATIONDATE';

    public const HITS = 'HITS';

    public const LIKES = 'LIKES';

    public const DISLIKES = 'DISLIKES';

    public const VOTES = 'VOTES';

    public const RATE = 'RATE';
}
