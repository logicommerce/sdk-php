<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\DeleteRowsParametersValidator;

/**
 * This is the basket model (delete rows resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class DeleteRowsParametersGroup extends ParametersGroup {

    protected array $hashes;

    /**
     * Sets an array of AddHashParametersGroup
     *
     * @param string[] $hashes
     *
     * @return void
     */
    public function setHashes(array $hashes): void {
        $this->hashes = [];
        foreach ($hashes as $hash) {
            $this->addHash($hash);
        }
    }

    /**
     * Adds a new hash to the array of Hashes for this parameters group.
     *
     * @param AddHashParametersGroup $hash
     *
     * @return void
     */
    public function addHash(string $hash): void {
        $this->hashes ??= [];
        $this->hashes[] = $hash;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): DeleteRowsParametersValidator {
        return new DeleteRowsParametersValidator();
    }
}
