<?php

namespace SDK\Dtos\Settings;

use SDK\Core\Dtos\Element;
use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Dtos\Traits\IdentifiableElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;
use SDK\Enums\BlogPostCommentMode;

/**
 * This is the blog settings class.
 * The information of API blog settings will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see BlogSettings::getLanguage()
 * @see BlogSettings::getCommentsMode()
 * @see BlogSettings::getUserVerificationRequired()
 * @see BlogSettings::getActive()
 * @see BlogSettings::getAllowSubscriptions()
 * @see BlogSettings::getAllowCategorySubscriptions()
 * @see BlogSettings::getAllowPostSubscriptions()
 * @see BlogSettings::getMaxIpComments()
 *
 * @see Element
 * @see ElementTrait
 * @see IdentifiableElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Dtos\Settings
 */
class BlogSettings extends Element {
    use ElementTrait, IdentifiableElementTrait, EnumResolverTrait;

    protected ?BlogSettingsLanguage $language = null;

    protected string $commentsMode = '';

    protected bool $userVerificationRequired = false;

    protected bool $active = false;

    protected bool $allowSubscriptions = false;

    protected bool $allowCategorySubscriptions = false;

    protected bool $allowPostSubscriptions = false;

    protected int $maxIpComments = 0;

    /**
     * Returns the blog language object.
     *
     * @see BlogSettingsLanguage
     * @return BlogSettingsLanguage|NULL
     */
    public function getLanguage(): ?BlogSettingsLanguage {
        return $this->language;
    }

    protected function setLanguage(array $language): void {
        $this->language = new BlogSettingsLanguage($language);
    }

    /**
     * Returns the blog comments mode.
     *
     * @return string
     */
    public function getCommentsMode(): string { // ENUM
        return $this->getEnum(BlogPostCommentMode::class, $this->commentsMode, BlogPostCommentMode::ANONYMOUS_AND_REGISTERED_USERS);
    }

    /**
     * Sets if the blog requires user verification.
     *
     * @return bool
     */
    public function getUserVerificationRequired(): bool {
        return $this->userVerificationRequired;
    }

    /**
     * Sets if the blog is active or not.
     *
     * @return bool
     */
    public function getActive(): bool {
        return $this->active;
    }

    /**
     * Sets if the blog allow subscriptions or not.
     *
     * @return bool
     */
    public function getAllowSubscriptions(): bool {
        return $this->allowSubscriptions;
    }

    /**
     * Sets if the blog allow category subscriptions or not.
     *
     * @return bool
     */
    public function getAllowCategorySubscriptions(): bool {
        return $this->allowCategorySubscriptions;
    }

    /**
     * Sets if the blog allow post subscriptions or not.
     *
     * @return bool
     */
    public function getAllowPostSubscriptions(): bool {
        return $this->allowPostSubscriptions;
    }

    /**
     * Returns the blog maximum number of comments per IP.
     *
     * @return int
     */
    public function getMaxIpComments(): int {
        return $this->maxIpComments;
    }
}
