<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Basket;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Basket\CommentParametersValidator;

/**
 * This is the basket model (comment resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Basket
 */
class CommentParametersGroup extends ParametersGroup {

    protected string $comment;

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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): CommentParametersValidator {
        return new CommentParametersValidator();
    }
}
