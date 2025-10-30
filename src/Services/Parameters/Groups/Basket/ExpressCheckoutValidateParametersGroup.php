<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\ExpressCheckoutValidateParametersValidator;

/**
 * This is the validate express checkout parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class ExpressCheckoutValidateParametersGroup extends ParametersGroup {

    protected array $params;

    protected string $body;

    /**
     * Sets the params parameter for this parameters group.
     *
     * @param array $params
     *
     * @return void
     */
    public function setParams(array $params): void {
        $this->params = $params;
    }

    /**
     * Sets the body parameter for this parameters group.
     *
     * @param string $body
     *
     * @return void
     */
    public function setBody(string $body): void {
        $this->body = $body;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): ExpressCheckoutValidateParametersValidator {
        return new ExpressCheckoutValidateParametersValidator();
    }
}
