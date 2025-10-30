<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

use SDK\Core\Dtos\Error;

/**
 * This is the theme trait.
 *
 * @see ErrorTrait::getError()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait ErrorTrait {

    protected ?Error $error = null;

    /**
     * Returns the current element error (if there is error).
     *
     * @return Error|NULL
     */
    public function getError(): ?Error {
        return $this->error ?? null;
    }

    protected function setError($error): void {
        if ($error instanceof Error) {
            $this->error = $error;
        }
        elseif (is_array($error) && !empty($error)) {
            $this->error = new Error($error);
        }
    }
}
