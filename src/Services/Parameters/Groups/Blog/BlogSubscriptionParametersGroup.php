<?php

declare(strict_types=1);

namespace SDK\Services\Parameters\Groups\Blog;

use SDK\Core\Services\Parameters\Groups\ParametersGroup;
use SDK\Services\Parameters\Validators\Blog\BlogSubscriptionParametersValidator;

/**
 * This is the blog model (subscribe resources) parameters group class.
 *
 * @package SDK\Services\Parameters\Groups\Blog
 */
class BlogSubscriptionParametersGroup extends ParametersGroup {

    protected string $email;

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
     * @see ParametersGroup::getValidator()
     */
    protected function getValidator(): BlogSubscriptionParametersValidator {
        return new BlogSubscriptionParametersValidator();
    }
}
