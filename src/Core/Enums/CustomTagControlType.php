<?php

namespace SDK\Core\Enums;

/**
 * This is the custom tags control type type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Core\Enums
 */
abstract class CustomTagControlType extends Enum {

    public const BOOLEAN = 'BOOLEAN';

    public const NUMBER = 'NUMBER';

    public const SHORT_TEXT = 'SHORT_TEXT';

    public const DATE = 'DATE';

    public const SELECTOR = 'SELECTOR';

    public const IMAGE = 'IMAGE';

    public const LONG_TEXT = 'LONG_TEXT';

    public const ATTACHMENT = 'ATTACHMENT';

    public const MULTIPLE_SELECTION = 'MULTIPLE_SELECTION';

    public const SINGLE_SELECTION_IMAGE = 'SINGLE_SELECTION_IMAGE';

    public const MULTIPLE_SELECTION_IMAGE = 'MULTIPLE_SELECTION_IMAGE';
}
