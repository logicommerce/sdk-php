<?php declare(strict_types=1);

namespace SDK\Core\Builders;

use SDK\Core\Dtos\Error;

/**
 * This is the builder to dinamically create Error DTOs.
 *
 * @see ErrorBuilder::build()
 *
 * @see Builder
 *
 * @package SDK\Core\Builders
 */
class ErrorBuilder extends Builder {

    public function __construct() {
        parent::__construct(Error::class);
    }

    protected function getMainClass(): string {
        return Error::class;
    }

    /**
     * Returns the created Error.
     */
    public function build(): Error {
        return new $this->class($this->data);
    }
}
