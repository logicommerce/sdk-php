<?php

namespace SDK\Enums;

use SDK\Core\Enums\Enum;

/**
 * This is the data file type enumerate.
 *
 * @see Enum
 *
 * @package SDK\Enums
 */
abstract class DataFileType extends Enum {

    public const XML = 'XML';

    public const JSON = 'JSON';

    public const CSV = 'CSV';

    public const TEXT = 'TEXT';

    public const JPEG = 'JPEG';

    public const PNG = 'PNG';

    public const PDF = 'PDF';

    public const GZIP = 'GZIP';
}
