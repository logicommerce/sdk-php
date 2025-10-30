<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the plugin type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class PaymentValidateType extends Enum {

    public const FORM = 'FORM';
    
    public const NO_DATA = 'NO_DATA';
    
    public const XML = 'XML';

    public const REDIRECT = 'REDIRECT';
    
    public const WEBHOOK_MESSAGE = 'WEBHOOK_MESSAGE';

}