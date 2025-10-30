<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Dtos\Blog\BloggerLanguage;
use SDK\Dtos\Blog\PostBloggerLanguage;

/**
 * This class will return the kind of blogger language we need.
 *
 * @see Factory::getElement()
 * @see BloggerLanguageFactory::getBloggerLanguage()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class BloggerLanguageFactory {

    /**
     * Returns the needed type of blogger language.
     *
     * @return PostBloggerLanguage|NULL
     */
    public static function getBloggerLanguage(array $data = []): ?PostBloggerLanguage {
        if (isset($data['description'])) {
            return new BloggerLanguage($data);
        }
        return new PostBloggerLanguage($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?PostBloggerLanguage {
        return self::getBloggerLanguage($data);
    }
}
