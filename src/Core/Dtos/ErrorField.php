<?php
namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\ErrorFieldType;
/**
 * This is the Error Field class.
 * The API Error Field data will be stored in that class and will remain immutable (only get methods are prevision)
 *
 * @see ErrorField::getName()
 * @see ErrorField::getType()
 * @see ErrorField::getAdditionalInformation()
 *
 * @package SDK\Core\Dtos
 */
class ErrorField {
    use ElementTrait, EnumResolverTrait;
    
    protected string $name = '';

    protected string $type = '';

    protected string $additionalInformation = '';

    /**
     * Returns the name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

     /**
     * Returns the type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->getEnum(ErrorFieldType::class, $this->type, ErrorFieldType::REQUIRED);
    }

     /**
     * Returns the additional information.
     *
     * @return string
     */
    public function getAdditionalInformation(): string {
        return $this->additionalInformation;
    }

}
