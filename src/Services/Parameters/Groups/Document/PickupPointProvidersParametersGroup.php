<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Document;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Core\Services\Parameters\Groups\Traits\PaginableItemsParametersGroupTrait;
use SDK\Services\Parameters\Validators\Document\PickupPointProvidersParametersValidator;

/**
 * This is the Document model (PickupPointProviders resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Document
 */
class PickupPointProvidersParametersGroup extends ParametersGroup {
    use PaginableItemsParametersGroupTrait;

    protected string $countryCode;

    protected string $idList;

    /**
     * Sets the country ISO code parameter for this parameters group.
     *
     * @param string $countryCode
     *
     * @return void
     */
    public function setCountryCode(string $countryCode): void {
        $this->countryCode = $countryCode;
    }

    /**
     * Sets a list of internal identifiers for this parameters group.
     *
     * @param string $idList
     *
     * @return void
     */
    public function setIdList(string $idList): void {
        $this->idList = $idList;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): PickupPointProvidersParametersValidator {
        return new PickupPointProvidersParametersValidator();
    }
}
