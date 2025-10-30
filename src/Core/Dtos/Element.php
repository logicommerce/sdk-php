<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ErrorTrait;

/**
 * This is the main class.
 * We use this class to check some return types.
 *
 * @package SDK\Core\Dtos
 */
abstract class Element implements \JsonSerializable {
    use ErrorTrait;
}
