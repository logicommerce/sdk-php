<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the option type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class OptionType extends Enum {

    public const BOOLEAN = 'BOOLEAN';

    public const SHORT_TEXT = 'SHORT_TEXT';

    public const SINGLE_SELECTION = 'SINGLE_SELECTION';

    public const MULTIPLE_SELECTION = 'MULTIPLE_SELECTION';

    public const SINGLE_SELECTION_IMAGE = 'SINGLE_SELECTION_IMAGE';

    public const MULTIPLE_SELECTION_IMAGE = 'MULTIPLE_SELECTION_IMAGE';

    public const SELECTOR = 'SELECTOR';

    public const DATE = 'DATE';

    public const LONG_TEXT = 'LONG_TEXT';

    public const ATTACHMENT = 'ATTACHMENT';
}
