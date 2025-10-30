<?php

namespace SDK\Core\Dtos;

use SDK\Core\Dtos\Traits\ElementTrait;
use SDK\Core\Enums\Traits\EnumResolverTrait;

/**
 * This is the Theme class.
 * The API Themes will be stored in that class and will remain immutable (only get methods are available)
 *
 * @see Theme::getLayout()
 * @see Theme::getContent()
 * @see Theme::getName()
 * @see Theme::getChannel()
 *
 * @see ElementTrait
 * @see EnumResolverTrait
 *
 * @package SDK\Core\Dtos
 */
class Theme {
    use ElementTrait, EnumResolverTrait;

    protected const DEFAULT = 'default';

    protected string $layout = self::DEFAULT;

    protected string $content = self::DEFAULT;

    protected string $name = self::DEFAULT;

    protected string $channel = '';

    /**
     * Returns the element layout name.
     *
     * @return string
     */
    public function getLayout(): string {
        return $this->layout;
    }

    /**
     * Returns the element content disposition name.
     *
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }

    /**
     * Returns the theme name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the website user's calculated channel.
     *
     * @return string
     */
    public function getChannel(): string {
        return $this->channel;
    }
}
