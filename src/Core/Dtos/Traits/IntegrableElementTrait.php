<?php declare(strict_types=1);

namespace SDK\Core\Dtos\Traits;

/**
 * This is the integrable elements trait.
 * This trait will be used by elements that can be integrated (that means that they have a pId).
 *
 * @see IntegrableElementTrait::getPId()
 *
 * @package SDK\Core\Dtos\Traits
 */
trait IntegrableElementTrait {

    /**
     * Public and readable element id.
     * Setted by the user on LogiCommerce.
     * All the integrable elements by the LogiCommerce API will send it.
     * Useful for integrations and other 3rd party softwares that need to connect to LogiCommerce software.
     *
     * @var string
     */
    protected string $pId = '';

    /**
     * Returns the element public id (pId).
     *
     * @return string
     */
    public function getPId(): string {
        return $this->pId;
    }
}
