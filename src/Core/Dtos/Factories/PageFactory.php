<?php

namespace SDK\Core\Dtos\Factories;

use SDK\Core\Dtos\Factory;
use SDK\Dtos\Catalog\Page\Page;

/**
 * This class will return the kind of page we need.
 *
 * @see Factory::getElement()
 * @see PageFactory::getPage()
 *
 * @uses Factory
 * @see Factory
 *
 * @package SDK\Dtos\Factories
 */
abstract class PageFactory extends Factory {

    protected const TYPE = 'pageType';

    protected const NAMESPACE = 'SDK\Dtos\Catalog\Page';

    protected const DEFAULT_CLASS = self::NAMESPACE . '\Page';

    protected const CLASS_SUFFIX = 'Page';

    /**
     * Returns the needed type of page.
     *
     * @return Page|NULL
     */
    public static function getPage(array $data = []): ?Page {
        return self::getItem($data);
    }

    /**
     *
     * @see \SDK\Core\Dtos\Factory::getElement()
     */
    public static function getElement(array $data = []): ?Page {
        return self::getPage($data);
    }
}
