<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed on Plugins.
 *
 * @package SDK\Core\Exceptions
 */
class PluginException extends SdkException {

    public const UNDEFINED_ACTION_PARAMETERS_GROUP_CLASS = 'F030-P000';

    public const UNDEFINED_DATA_CLASS = 'F030-P001';

    public const INTERFACE_VALIDATION_FAILED = 'F030-P002';

    public const UNDEFINED_PARAMETER_GROUP_FOR_TRIGGER_NAME = 'F030-P003';
}
