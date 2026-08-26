<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the taxId owner type enumerate.
 * It represents whether the taxId owner is a natural person or a legal entity.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class TaxIdOwnerType extends Enum {

    public const NATURAL_PERSON = 'NATURAL_PERSON';

    public const LEGAL_ENTITY = 'LEGAL_ENTITY';
}
