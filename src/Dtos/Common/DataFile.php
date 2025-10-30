<?php

namespace SDK\Dtos\Common;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\HttpStatus;
use SDK\Core\Dtos\Traits\ElementNameTrait;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\DataFileType;

/**
 * This is the data file class.
 * The API data files will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see DataFile::getType()
 * @see DataFile::getData()
 *
 * @see Element
 * @see ElementTrait
 * @see ElementNameTrait
 * @see EnumResolverTrait
 * @see HttpStatus
 *
 * @package SDK\Dtos\Common
 */
class DataFile extends Element {
    use ElementTrait, ElementNameTrait, EnumResolverTrait;

    protected string $type = '';

    protected string $data = '';

    protected ?HttpStatus $httpStatus = null;

    /**
     * Returns the file type.
     *
     * @return string
     */
    public function getType(): string { // ENUM
        return $this->getEnum(DataFileType::class, $this->type, DataFileType::XML);
    }

    /**
     * Returns the file data.
     *
     * @return string
     */
    public function getData(): string {
        return $this->data;
    }

    /**
     * Returns the file HTTP status.
     *
     * @return HttpStatus|NULL
     */
    public function getHttpStatus(): ?HttpStatus {
        return $this->httpStatus;
    }

    protected function setHttpStatus(array $httpStatus): void {
        $this->httpStatus = new HttpStatus($httpStatus);
    }
}
