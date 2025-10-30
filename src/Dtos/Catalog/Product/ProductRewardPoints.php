<?php

namespace SDK\Dtos\Catalog\Product;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IntegrableElementTrait;
use SDK\Dtos\Common\NameDescription;
use SDK\Dtos\Common\RewardPointsRule;

/**
 * This is the product reward points class.
 * The product reward points of API items will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see ProductRewardPoints::getLanguage()
 * @see ProductRewardPoints::getRules()
 *
 * @see Element
 * 
 * @uses ElementTrait
 * 
 * @package SDK\Dtos\Catalog\Product
 */
class ProductRewardPoints extends Element {
    use ElementTrait, IntegrableElementTrait;

    protected ?NameDescription $language = null;

    protected array $rules = [];

    /**
     * Returns name and description.
     *
     * @return NULL|NameDescription
     */
    public function getLanguage(): ?NameDescription {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new NameDescription($language);
    }

    /**
     * Returns the rules values.
     *
     * @return RewardPointsRule[]
     */
    public function getRules(): array {
        return $this->rules;
    }

    protected function setRules(array $rules): void {
        $this->rules = $this->setArrayField($rules, RewardPointsRule::class);
    }

}
