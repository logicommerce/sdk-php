<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Product;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Product\AddCommentParametersValidator;

/**
 * This is the product model (add comments resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Product
 */
class AddCommentParametersGroup extends ParametersGroup {

    protected string $comment;

    protected int $rating;

    protected string $nick;

    protected int $commentId;

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
     * Sets the rating parameter for this parameters group.
     *
     * @param int $rating
     *
     * @return void
     */
    public function setRating(int $rating): void {
        $this->rating = $rating;
    }

    /**
     * Sets the nick parameter for this parameters group.
     *
     * @param string $nick
     *
     * @return void
     */
    public function setNick(string $nick): void {
        $this->nick = $nick;
    }

    /**
     * Sets the comment parent internal identifier parameter for this parameters group.
     *
     * @param int $commentId
     *
     * @return void
     */
    public function setCommentId(int $commentId): void {
        $this->commentId = $commentId;
    }

    /**
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): AddCommentParametersValidator {
        return new AddCommentParametersValidator();
    }
}
