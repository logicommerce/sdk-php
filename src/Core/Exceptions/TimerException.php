<?php

namespace SDK\Core\Exceptions;

/**
 * This is the Exception class for errors throwed doing a time measurement.
 *
 * @package SDK\Core\Exceptions
 */
class TimerException extends SdkException {

    public const UNFINISHED = 'F030-T000';

    public const ALREADY_STARTED = 'F030-T001';

    public const ALREADY_STOPPED = 'F030-T002';

    public const CANNOT_ADD_FLAG = 'F030-T003';

    public const UNDEFINED_FLAG = 'F030-T004';

    public const EXISTING_FLAG = 'F030-T005';

    public const NOT_STARTED = 'F030-T006';

    public const ALREADY_EXECUTED = 'F030-T007';
}
