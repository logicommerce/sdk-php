<?php declare(strict_types=1);

namespace SDK\Services\Parameters\Validators;

use SDK\Core\Services\Parameters\Validators\ParametersValidator;
use SDK\Core\Services\Parameters\Validators\Traits\EmailParametersValidatorTrait;
use SDK\Core\Services\Parameters\Validators\Traits\IdentifiableItemsParametersValidatorTrait;

/**
 * This is the contact parameters validation class.
 *
 * @package SDK\Services\Parameters\Validators
 */
class ContactParametersValidator extends ParametersValidator {
    use IdentifiableItemsParametersValidatorTrait, EmailParametersValidatorTrait;

    protected function validateMotiveId($motiveId): ?bool {
        return $this->validateId($motiveId);
    }

    protected function validateComment($comment): ?bool {
        return $this->validateString($comment,0);
    }

    protected function validateFirstName($firstName): ?bool {
        return $this->validateString($firstName,0);
    }

    protected function validateLastName($lastName): ?bool {
        return $this->validateString($lastName,0);
    }

    protected function validateCompany($company): ?bool {
        return $this->validateString($company,0);
    }

    protected function validateAddress($address): ?bool {
        return $this->validateString($address,0);
    }

    protected function validateAddressAdditionalInformation($addressAdditionalInformation): ?bool {
        return $this->validateString($addressAdditionalInformation,0);
    }

    protected function validateNumber($number): ?bool {
        return $this->validateString($number,0);
    }

    protected function validateCity($city): ?bool {
        return $this->validateString($city,0);
    }

    protected function validateState($state): ?bool {
        return $this->validateString($state,0);
    }

    protected function validatePostalCode($postalCode): ?bool {
        return $this->validateString($postalCode,0);
    }

    protected function validateVat($vat): ?bool {
        return $this->validateString($vat,0);
    }

    protected function validateNif($nif): ?bool {
        return $this->validateString($nif,0);
    }

    protected function validatePhone($phone): ?bool {
        return $this->validateString($phone,0);
    }

    protected function validateMobile($mobile): ?bool {
        return $this->validateString($mobile,0);
    }

    protected function validateFax($fax): ?bool {
        return $this->validateString($fax,0);
    }
}
