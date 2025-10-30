<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the form type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class FormType extends Enum {

    public const END_ORDER = 'END_ORDER';

    public const SET_USER = 'SET_USER';

    public const UPDATE_USER = 'UPDATE_USER';

    public const ADDRESS = 'ADDRESS';

    public const CONTACT = 'CONTACT';
}
