<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Blog;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Blog\AddBlogPostCommentParametersValidator;

/**
 * This is the blog model (add post comments resource) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Blog
 */
class AddBlogPostCommentParametersGroup extends ParametersGroup {

    protected string $comment;

    protected string $email;

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
    protected function getValidator(): AddBlogPostCommentParametersValidator {
        return new AddBlogPostCommentParametersValidator();
    }
}
