<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Product\QueryParametersValidator;

/**
 * This is the product model (query resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class QueryParametersGroup extends ParametersGroup {

    protected string $name;

    protected string $email;

    protected string $comment;

    protected string $phone;

    /**
     * Sets the name parameter for this parameters group.
     *
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * Sets the email parameter for this parameters group.
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * Sets the comment parameter for this parameters group.
     *
     * @param string $comment
     *
     * @return void
     */
    public function setComment(string $comment): void {
        $this->comment = $comment;
    }

    /**
     * Sets the phone parameter for this parameters group.
     *
     * @param string $phone
     *
     * @return void
     */
    public function setPhone(string $phone): void {
        $this->phone = $phone;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): QueryParametersValidator {
        return new QueryParametersValidator();
    }
}
